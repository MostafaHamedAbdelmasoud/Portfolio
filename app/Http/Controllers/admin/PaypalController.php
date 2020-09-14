<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Work;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $plan_id;
    
    public function __construct()
    {
        if (config('paypal.settings.mode') == 'live') {
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }

        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function createPayment()
    {

        try {
                return 'yes';
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $item1 = new Item();
            $item1->setName('Ground Coffee 40 oz')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setSku("123123") // Similar to `item_number` in Classic API
                ->setPrice(7.5);

            $itemList = new ItemList();
            $itemList->setItems(array($item1));

            // $details = new Details();
            // $details->setShipping(1.2)
            //     ->setTax(1.3)
            //     ->setSubtotal(17.50);

            $amount = new Amount();
            $amount->setCurrency("USD")
                ->setTotal($item1->getPrice());
            // ->setDetails($details);

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Payment description")
                ->setInvoiceNumber(uniqid());

            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl("http://localhost:8000")
                ->setCancelUrl("http://localhost:8000");

            // Add NO SHIPPING OPTION
            $inputFields = new InputFields();
            $inputFields->setNoShipping(1);

            $webProfile = new WebProfile();
            $webProfile->setName('test' . uniqid())->setInputFields($inputFields);

            $webProfileId = $webProfile->create($this->apiContext)->getId();

            $payment = new Payment();
            $payment->setExperienceProfileId($webProfileId); // no shipping
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));

            try {
                $payment->create($this->apiContext);
            } catch (PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            } catch (Exception $ex) {
                echo $ex;
                exit(1);
            }
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }


        return $payment;
    }

    public function excutePayment(Request $request)
    {
        try {

            $paymentId = $request->paymentID;
            $payment = Payment::get($paymentId, $this->apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($request->payerID);

            // $transaction = new Transaction();
            // $amount = new Amount();
            // $details = new Details();

            // $details->setShipping(2.2)
            //     ->setTax(1.3)
            //     ->setSubtotal(17.50);

            // $amount->setCurrency('USD');
            // $amount->setTotal(21);
            // $amount->setDetails($details);
            // $transaction->setAmount($amount);

            // $execution->addTransaction($transaction);

            try {
                $result = $payment->execute($execution, $this->apiContext);
                return $result;
            } catch (PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            } catch (Exception $ex) {
                echo $ex;
                exit(1);
            }
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }

    }
}
