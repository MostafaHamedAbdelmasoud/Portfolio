<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
// use Auth;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes(['verify' => true]);
Auth::routes();

Route::post('/create-payment', 'admin\PaypalController@createPayment');
Route::post('/execute-payment', 'admin\PaypalController@excutePayment');


//

Route::get('', 'admin\IndexController@homeView')->name('home.guest');
Route::get('/index', 'admin\IndexController@homeView')->name('home.guest');
Route::get('/index{id}', 'admin\IndexController@homeView')->name('home.guest');
// Route::get('/index.blade.php', 'admin\IndexController@homeView')->name('home.guest');

Route::get('/services/{id}', 'admin\CategoriesController@index2');
Route::get('/prev_Works/{id}', 'admin\WorksController@showPrevWorks');
Route::get('/show_Work/{id}', 'admin\WorksController@showPrevWorksDetail');

// Route::get('/admin', function () {
//     return view('ipanel.login');
// });
Route::get('admin_verify', 'admin\AdminController@checkAdmin');

Route::get('/services/{id}', 'admin\CategoriesController@index2');


Route::post('/email', 'ContactController@send');
Route::post('/request_service', 'ContactController@send');

Route::get('/contact_us', function () {
    Mail::to('mail@gmail.com')->send(new ContactUs());
    return new ContactUs();
});


//request service
Route::get('/request_service', function () {
    return view('reqservice');
});


//downloads
Route::get('/download/{file}', 'DownloadsController@download');


Route::group(['prefix' => '/user', 'middleware' => ['auth']], function () {

    Route::get('logout', function () {
        Auth::logout();
        return view('index');
    });
    Route::get('/', 'admin\IndexController@homeView');

});

//ipanel stuff
// Route::group(['prefix' => 'ipanel','middleware' => 'isAdmin'], function () {
Route::group(['prefix' => 'ipanel', 'middleware' => ['isAdmin']], function () {
    
    Route::get('/', 'admin\DashBoardController@index');
    Route::get('/admin', 'admin\DashBoardController@index');

    //orders
    Route::get('/orders', 'admin\OrderController@index');
    Route::get('/edit_orders/{id}', 'admin\OrderController@edit');
    Route::post('/edit-orders_values/{id}', 'admin\OrderController@update');


    //services
    Route::get('/show-services', 'admin\ServicesController@index');
    Route::get('/display-services/{id}', 'admin\ServicesController@show');
    Route::get('/add-services', 'admin\ServicesController@create');
    Route::post('/create-services', 'admin\ServicesController@store');
    Route::get('/edit-services/{id}', 'admin\ServicesController@edit');
    Route::post('/edit-services_values/{id}', 'admin\ServicesController@update');
    Route::get('/delete-services/{id}', 'admin\ServicesController@destroy');


    //categories
    Route::get('categories', 'admin\CategoriesController@index');
    Route::get('/display-categories/{id}', 'admin\CategoriesController@show');
    Route::get('/add-categories', 'admin\CategoriesController@create');
    Route::post('/create-categories', 'admin\CategoriesController@store');
    Route::get('/edit_category/{id}', 'admin\CategoriesController@edit');
    Route::post('/edit_category_values/{id}', 'admin\CategoriesController@update');
    Route::get('/delete_category/{id}', 'admin\CategoriesController@destroy');

    //skill
    Route::get('skills/',  'admin\SkillsController@index');
    Route::get('add-skill/', 'admin\SkillsController@create');
    Route::post('create-skill/', 'admin\SkillsController@store');
    Route::get('edit-skill/{id}', 'admin\SkillsController@edit');
    Route::post('edit-skill_values/{id}', 'admin\SkillsController@update');



    //works
    Route::get('works', 'admin\WorksController@index');
    Route::get('/add_work', 'admin\WorksController@create');
    Route::post('/create_work', 'admin\WorksController@store');
    Route::get('/edit_work/{id}', 'admin\WorksController@edit');
    Route::post('edit_work_values/{id}', 'admin\WorksController@update');
    Route::get('delete_work/{id}', 'admin\WorksController@destroy');
    Route::get('show_work/{id}', 'admin\WorksController@show');
    Route::get('addToLastWorks/{id}', 'admin\WorksController@addToLastWorks');
    Route::get('RemoveFromLastWorks/{id}', 'admin\WorksController@RemoveFromLastWorks');


    //about
    Route::get('/about', 'admin\FieldController@index');
    Route::get('/about/add-field', 'admin\FieldController@create');
    Route::post('/about/add-field_values', 'admin\FieldController@store');
    Route::get('/about/edit-field/{id}', 'admin\FieldController@edit');
    Route::post('/about/edit_field_values/{id}', 'admin\FieldController@update');
    Route::get('/about/delete-field/{id}', 'admin\FieldController@destroy');


    //Main Page
    Route::get('/edit-main', 'UserController@index');
    Route::post('main', 'UserController@storeMain');
});


// Route::get('/home', 'HomeController@index')->name('home');
