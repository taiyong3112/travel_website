<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@homepage')->name('index');
Route::get('home-logout', 'HomeController@logout')->name('home.logout');




Route::group(['prefix'=>'pages'], function(){
	Route::get('/about', 'HomeController@about')->name('about');
	Route::get('/blog', 'HomeController@blog')->name('blog');
	Route::get('/blog/{slug}', 'HomeController@blog_detail')->name('blog-detail');

	// Comment and Reply
	Route::post('/blog/{slug}/comment', 'HomeController@comment')->name('comment');
	Route::post('/blog/{slug}/{id}/reply', 'HomeController@reply_comment')->name('reply-comment');

	Route::get('/contact','HomeController@contact')->name('contact');
	Route::get('/faq', 'HomeController@faq')->name('faq');
	Route::get('/gallery', 'HomeController@gallery')->name('gallery');
	Route::get('/gallery/{slug}', 'HomeController@gallery_destination')->name('gallery-destination');
	Route::get('/service', 'HomeController@service')->name('service');
	Route::get('account','HomeController@login')->name('account');
	Route::post('account','HomeController@post_login')->name('postlogin');
	Route::get('register', 'HomeController@register')->name('customer_register');
	Route::post('register', 'HomeController@post_register')->name('customer_post_register');

	Route::get('booking-success', 'BookingController@success')->name('booking.success');
	Route::post('booking/{id}', 'BookingController@submit_form')->name('booking');

	Route::get('/{slug}', 'HomeController@destination')->name('home.destination');//để slug cuối cùng vì nếu để ở trên máy chủ có thể duyệt tìm cái tên slug trong database của những trang khác
	//Rating
	Route::post('/{slug}/rating','HomeController@rating')->name('home.rating');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/error', 'Admin\DashboardController@error')->name('admin.error');

Route::group(['middleware' => ['auth','admin'], 'prefix'=> 'admin', 'as' => 'admin.'], function(){
	Route::get('/', 'Admin\DashboardController@dashboard')->name('dashboard');

	Route::get('file-manager',function(){
		return view('admin.file');
	})->name('file');
	Route::resource('destination','Admin\DestinationController');
	Route::resource('package','Admin\PackageController');
	Route::resource('tour','Admin\TourController');
	Route::get('booking', 'Admin\BookingController@admin_index')->name('booking');
	Route::resource('role','Admin\RoleController');
	Route::resource('user', 'Admin\UserController');
	Route::resource('gallery', 'Admin\GalleryController');	
	Route::resource('blog', 'Admin\BlogController');
	Route::resource('tag', 'Admin\TagController');
	Route::get('add_account', 'Admin\UserController@add')->name('add_account');
	Route::resource('rating','Admin\RatingController');
});
