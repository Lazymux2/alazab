<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=e253f13ebe6d16
MAIL_PASSWORD=87972f6af8b075
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=alazbtr@gmail.com
MAIL_FROM_NAME="${APP_NAME}"


mailgun

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailgun.org
MAIL_PORT=587
MAIL_USERNAME=postmaster@sandbox8aae9b0236fa4113a8889710ff829a52.mailgun.org
MAIL_PASSWORD=833fe1e1c0d31601dd2d7c76a1d43169-9ad3eb61-3761ebba
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=alazbtr@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
*/


//if(env('APP_ENV') == 'production')
//\URL::forceScheme('https');


Route::get('/time',function(){


    return date('h:i:s :a');
});



Route::get('/phpinfo', function() {
    return phpinfo();
});
Route::get('/', 'MainController@showMain')->name('Main');


Route::get('/pre','MainController@Preper')->name('pre');

Route::get('/MainSearch','MainController@MainSearch')->name("MainSearch");
Route::post('/MainSearch','MainController@MainSearch')->name("MainSearch");
Route::get('/deatilsAjax','MainController@deatilsAjax')->name('deatilsAjax');

Route::get('/ShowItemsAjax','MainController@ShowItemsAjax')->name('ShowItemsAjax');
Route::get('/Main', 'MainController@showMain')->name('Main');
Route::get('/Home', 'MainController@showMain')->name('Main');




Route::post('/order','OrderController@addOrder')->name('order');



Route::get('/ShowItems','MainController@ShowItems')->name('ShowItems'); 



Route::get('/deatils','MainController@deatils')->name('deatils');


Route::get('/showmore','MainController@showmore')->name('showmore');



Route::get('/deleteOrder','HomeController@deleteOrderFromUser')->name('deleteOrder')->middleware('verified');


Route::get('/order','HomeController@order')->name('order')->middleware('verified');
Route::get('/myorders','HomeController@myorders')->name('myorders')->middleware('verified');
Auth::routes(['verify'=>true]);
Route::prefix('/admin')->group(function(){
    Route::get('/home','Users\Admin\AdminController@index')->name('home');
    Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/register-admin', 'Users\Admin\AdminController@register')->name('register-admin');
    Route::post('/register-admin', 'Users\Admin\AdminController@register')->name('register-admin.submit');

    Route::get('/denyOrder','Users\Admin\AdminController@denyOrder')->name('denyOrder');
    Route::get('/acceptOrder','Users\Admin\AdminController@AcceptOrder')->name('acceptOrder');
   
    Route::get('/getorders','Users\Admin\AdminController@getOrders')->name('getorders');

    
    Route::get('/getitemsfordept','Users\Admin\AdminController@getitemsfordept')->name('getitemsfordept');

    Route::get('/rigest','Users\Admin\AdminController@rigest')->name('rigest');
    Route::post('/rigest','Users\Admin\AdminController@rigest')->name('rigest');

    Route::get('/Mitem','Users\Admin\AdminController@getAllMitems')->name('Mitem');
    Route::post('/deldept','Users\Admin\AdminController@deldept')->name('deldept');
    Route::post('/deptadd','Users\Admin\AdminController@deptadd')->name('deptadd');
    Route::get('/deptadd','Users\Admin\AdminController@deptadd')->name('deptadd');
    Route::get('/InfoForm','Users\Admin\AdminController@show')->name('InfoForm');
    Route::post('/InfoForm','Users\Admin\AdminController@show')->name('InfoForm');

    Route::get('/locadd','Users\Admin\AdminController@locadd')->name('locadd');
   Route::post('/locadd','Users\Admin\AdminController@locadd')->name('locadd');
    
   Route::post('/deleteloc','Users\Admin\AdminController@deleteloc')->name('deleteloc');
    Route::get('/getlocinfo','Users\Admin\AdminController@getlocinfo')->name('getlocinfo');
   
    Route::post('/MitemaddPost','Users\Admin\AdminController@addnewMitem')->name('MitemaddPost');
   
    Route::get('/Mitemadd','Users\Admin\AdminController@addnewMitem')->name('Mitemadd');
    Route::post('/Mitemadd','Users\Admin\AdminController@addnewMitem')->name('Mitemadd');

    Route::get('/delmitem','Users\Admin\AdminController@delmitem')->name('delmitem');
    Route::post('/delmitem','Users\Admin\AdminController@delmitem')->name('delmitem');

    Route::get('/delimg','Users\Admin\AdminController@delimg')->name('delimg');


});


