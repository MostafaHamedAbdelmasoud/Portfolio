<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        //
        $user_name  = $request->user_name;
        $email  = $request->email;
        $msg  = $request->msg;
        // dd($request);

        $contact = new Contact();
        $contact->name = $user_name;
        $contact->mail = $email;
        $contact->message =  $msg;
        $contact->save();


        // $to_name = 'TO_NAME';
        // $to_email = 'TO_EMAIL_ADDRESS';
        // $data = array('name' => "Sam Jose", "body" => "Test mail");

        // Mail::send('emails.mail', $data, function ($message) use ($to_name, $to_email) {
        //     $message->to($to_email, $to_name)
        //         ->subject('Artisans Web Testing Mail');
        //     $message->from('FROM_EMAIL_ADDRESS', 'Artisans Web');
        // });

        Mail::send(
            new ContactUs(),
            ['email' => $email],
            function ($message) use ($email) {
                $message->to($email)->subject('Welcome to omar Portfolio');
            }
        );
        // Mail::to('mail@gmail.com')->send(new ContactUs());
        return  redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
