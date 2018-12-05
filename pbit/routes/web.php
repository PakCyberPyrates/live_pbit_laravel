<?php

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


Route::pattern('id', '[0-9]+');

Auth::routes();
 // Created by Jasvir Routes

  Route::get ( '/', function(){  return view('comming_soon'); });
  //Route::get ( '/', 'WelcomeController@index' );
  Route::post ( '/custom-login', 'UserController@login' );
  Route::post ( '/custom-register', 'UserController@register' );
  Route::get('/course/{name}', 'CourseController@singlecourse');
  Route::get('/course', 'CourseController@courselist');
  Route::get('/about', function(){ 
                                   return view('about',['class'=>'about','type'=>"innerpage",'breadcrum'=>'about', 'title'=>'About us']);
                                 });
  Route::get('ajax-pagination',array('as'=>'ajax.pagination','uses'=>'CourseController@ajaxPagination'));
  Route::post('/cart', 'CartfController@cartadd');  
  Route::get('/cart', 'CartfController@cartadd');  
  Route::post('/packagcart', 'CartfController@packagcart');    
  Route::get('/packagcart', 'CartfController@packagcart');    
  Route::post('/cartplus', 'CartfController@cartincrease');  
  Route::post('/cartminus', 'CartfController@cartdecrease'); 
  Route::post('/remove', 'CartfController@cartremove'); 
  Route::get('/remove', 'CartfController@cartremove'); 
  Route::post('/checkout', 'CartfController@cartcheckout');
  Route::get('/checkout', 'CartfController@cartcheckout');  
  Route::get('test-payment', 'StripePaymentController@payment_page');
  Route::post('test-payment', 'StripePaymentController@payment_test')->name('payment_test');
  Route::post('/payment/success', 'CartfController@frompaypal');
  Route::get('/payment/success', 'CartfController@frompaypal');
  Route::post('/payment/notify', 'CartfController@pppaymentnotify');
  Route::get('/payment/notify', 'CartfController@pppaymentnotify');
  Route::get('payment/cancel', 'CartfController@cancel'); 
  Route::post('/payment/stripe', 'CartfController@paymentstripe');
  Route::get('/payment/stripe', 'CartfController@paymentstripe');
  Route::get( '/download/', 'ActionController@download');
   Route::post('/user-search','DashboardController@search');
   Route::get('/user-search','DashboardController@search');

Route::group(['middleware'=>['user_check'] ] ,function(){

  Route::get( '/myorder/', 'DashboardController@myorderlist');
  Route::get( '/myorder/{id}', 'DashboardController@sigleorderlist');
  Route::post( '/rating/', 'DashboardController@ratingondashboard');
  Route::get( '/rating/', 'DashboardController@ratingondashboard');

  //Created by Garima
   Route::get ( '/user-dashboard/', 'DashboardController@index' );
   Route::get ( '/user-profile', 'DashboardController@profile' );
   Route::get ( '/updateProfile', 'DashboardController@updateProfile' );
   Route::post ( '/updateProfile', 'DashboardController@updateProfile' );
   Route::get ( '/user-changePassword', 'DashboardController@changePassword' );
   Route::post ( '/update-password', 'DashboardController@updatePassword' );
   Route::get ( '/update-password', 'DashboardController@updatePassword' );
   Route::get('/user/cource/{slug}','CourseController@show_cource_detail');
   Route::get('/user/cource/{slug}/{chapter}','DashboardController@showChapter');
   Route::get('/user/cource/{slug}/{chapter}/{topic_slug}','DashboardController@showTopic');
   Route::post( '/document-download/', 'DashboardController@download');
   Route::get( '/document-download/', 'DashboardController@download');
  
});
   // Created by sandeep
   ///
   
   Route::get('/topic/{name}','CourseController@sampleVideo');
   Route::get('/showCourseData/{name}','DashboardController@showChapters');
   Route::get('/page_not_found', function(){
     return View::make("errors/404");
  });
  
   Route::post('/search-data','DashboardController@userSearch');
   Route::get('/search-data','DashboardController@userSearch');

// Created by sandeep
  Route::get('/home', 'WelcomeController@index')->name('home');

Route::group(['middleware'=>['guest_check'] ] ,function(){

   Route::get('/user/verify/{token}', 'UserController@verify_user');
   Route::get('/admin', function(){  return view('auth.login'); });
   Route::get('/admin/login', function(){ return view('auth.login'); });

});

  Route::get( 'coupon/apply', 'CouponController@apply_coupon');
  Route::get( 'coupon/remove', 'CouponController@remove_coupon');

Route::group(['prefix'=>'admin','middleware'=>['admin_check'] ] ,function(){   
   Route::get('dashboard', 'DashboardController@admin_dashboard');
   Route::get('profile', 'UserController@profile');
   Route::post('change_password', 'UserController@change_password');
   Route::resource('users', 'UserController');
   Route::resource('topics', 'TopicController');
   Route::resource('orders', 'OrderController');
   Route::resource('courses', 'CourseController');
   Route::resource('chapters', 'ChapterController');
   Route::resource('payments', 'PaymentController');
   Route::resource('payments-meta', 'PaymentMetaController');
   Route::resource('notifications', 'NotificationController');
   Route::resource('payments-getways', 'PaymentGetwayController');
   Route::resource('email-templates', 'EmailTemplateController');
   Route::resource('logs', 'LogController');
   Route::resource('coupons', 'CouponController');
   Route::get('logs', 'LogController@index');
   Route::get('logs/all/clear', 'LogController@destroy');
   Route::post('payments-meta/{id}', 'PaymentMetaController@update');
   Route::get('users/status/{id}/{status}', 'UserController@change_status');
   Route::get('orders/export/{file_type}', 'OrderController@export_order');
   Route::get('orders/invoice/{order_id}', 'OrderController@invoice_download');
   Route::get('orders/print/{order_id}', 'OrderController@print_invoice');
   Route::get('get-chapters', 'ChapterController@get_chapters')->name('get-chapters');

   //Created BY Robin
   Route::resource('gateway-listing', 'GatewayListingController');
   Route::post ( 'change_gateway_status', 'GatewayListingController@changestatus' );
   Route::post ( 'get_gateway_configuration', 'GatewayListingController@get_gateway_configuration' );
   Route::post ( 'save_gateway_configuration', 'GatewayListingController@save_gateway_configuration' );
   Route::post ( 'get_unread_orders', 'NotificationController@get_unread_orders' );
   Route::post ( 'get_notifications', 'NotificationController@get_notifications' );

   // Created by sandeep
   Route::post ( 'send-notification', 'NotificationController@send_notification' );
   Route::get('logout', function(){
      Auth::logout();
      return redirect('/admin');
    });

});

Route::get('/logout', function(){
  Auth::logout();
  return redirect('/home');
});

 


/*Route::get('welcome/{locale}', function ($locale) {
    App::setLocale($locale);
});*/