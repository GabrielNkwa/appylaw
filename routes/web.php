<?php

use Illuminate\Support\Facades\Route;

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

//these are admin routes
Route::get('/app-login', 'App\Http\Controllers\HomeController@app_login')->name('app_login');
Route::post('/app-login', 'App\Http\Controllers\HomeController@app_login_post')->name('app_login_post');
Route::get('/app-logout', 'App\Http\Controllers\HomeController@app_logout')->name('app_logout');

Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard')->middleware(['auth', 'control_admin']);
Route::get('/profile', 'App\Http\Controllers\HomeController@profile')->name('profile')->middleware(['auth', 'control_admin']);
Route::post('/profile', 'App\Http\Controllers\HomeController@profile_post')->name('profile_post')->middleware(['auth', 'control_admin']);
Route::get('/admins', 'App\Http\Controllers\HomeController@admins')->name('admins')->middleware(['auth', 'control']);
Route::post('/admins-add', 'App\Http\Controllers\HomeController@admins_add')->name('admins_add')->middleware(['auth', 'control']);
Route::post('/admins-update', 'App\Http\Controllers\HomeController@admins_update')->name('admins_update')->middleware(['auth', 'control']);
Route::get('/admins-delete/{unique_id}', 'App\Http\Controllers\HomeController@admins_delete')->name('admins_delete')->middleware(['auth', 'control']);
Route::get('/users', 'App\Http\Controllers\HomeController@users')->name('users')->middleware(['auth', 'control_admin']);
Route::post('/users-sub', 'App\Http\Controllers\HomeController@users_sub')->name('users_sub')->middleware(['auth', 'control_admin']);
Route::get('/category', 'App\Http\Controllers\HomeController@category')->name('category')->middleware(['auth', 'control_admin']);
Route::post('/add-category', 'App\Http\Controllers\HomeController@add_category')->name('add_category')->middleware(['auth', 'control_admin']);
Route::post('/edit-category', 'App\Http\Controllers\HomeController@edit_category')->name('edit_category')->middleware(['auth', 'control_admin']);
Route::get('/delete-category/{unique_id}', 'App\Http\Controllers\HomeController@delete_category')->name('delete_category')->middleware(['auth', 'control_admin']);
Route::get('/document', 'App\Http\Controllers\HomeController@document')->name('document')->middleware(['auth', 'control_admin']);
Route::post('/add-document', 'App\Http\Controllers\HomeController@add_document')->name('add_document')->middleware(['auth', 'control_admin']);
Route::post('/edit-document', 'App\Http\Controllers\HomeController@edit_document')->name('edit_document')->middleware(['auth', 'control_admin']);
Route::get('/delete-document/{unique_id}', 'App\Http\Controllers\HomeController@delete_document')->name('delete_document')->middleware(['auth', 'control_admin']);
Route::get('/document-details/{unique_id}', 'App\Http\Controllers\HomeController@document_details')->name('document_details')->middleware(['auth', 'control_admin']);
Route::get('/document-download/{unique_id}', 'App\Http\Controllers\HomeController@document_download')->name('document_download')->middleware(['auth', 'control_admin']);
Route::get('/document-sales/{unique_id}', 'App\Http\Controllers\HomeController@document_sales')->name('document_sales')->middleware(['auth', 'control_admin']);
Route::get('/document-update/{unique_id}', 'App\Http\Controllers\HomeController@document_update')->name('document_update')->middleware(['auth', 'control_admin']);
Route::get('/event', 'App\Http\Controllers\HomeController@event')->name('event')->middleware(['auth', 'control_admin']);
Route::post('/add-event', 'App\Http\Controllers\HomeController@add_event')->name('add_event')->middleware(['auth', 'control_admin']);
Route::post('/edit-event', 'App\Http\Controllers\HomeController@edit_event')->name('edit_event')->middleware(['auth', 'control_admin']);
Route::get('/delete-event/{unique_id}', 'App\Http\Controllers\HomeController@delete_event')->name('delete_event')->middleware(['auth', 'control_admin']);
Route::get('/event-details/{unique_id}', 'App\Http\Controllers\HomeController@event_details')->name('event_details')->middleware(['auth', 'control_admin']);
Route::get('/event-sub/{unique_id}', 'App\Http\Controllers\HomeController@event_sub')->name('event_sub')->middleware(['auth', 'control_admin']);
Route::post('/event-sub-manual', 'App\Http\Controllers\HomeController@event_sub_manual')->name('event_sub_manual')->middleware(['auth', 'control_admin']);
Route::get('/event-sub-delete/{unique_id}', 'App\Http\Controllers\HomeController@event_sub_delete')->name('event_sub_delete')->middleware(['auth', 'control_admin']);
Route::get('/event-update/{unique_id}', 'App\Http\Controllers\HomeController@event_update')->name('event_update')->middleware(['auth', 'control_admin']);
Route::get('/lawyer', 'App\Http\Controllers\HomeController@lawyer')->name('lawyer')->middleware(['auth', 'control_admin']);
Route::post('/add-lawyer', 'App\Http\Controllers\HomeController@add_lawyer')->name('add_lawyer')->middleware(['auth', 'control_admin']);
Route::post('/edit-lawyer', 'App\Http\Controllers\HomeController@edit_lawyer')->name('edit_lawyer')->middleware(['auth', 'control_admin']);
Route::get('/lawyer-details/{unique_id}', 'App\Http\Controllers\HomeController@lawyer_details')->name('lawyer_details')->middleware(['auth', 'control_admin']);
Route::get('/lawyer-update/{unique_id}', 'App\Http\Controllers\HomeController@lawyer_update')->name('lawyer_update')->middleware(['auth', 'control_admin']);
Route::get('/delete-lawyer/{unique_id}', 'App\Http\Controllers\HomeController@delete_lawyer')->name('delete_lawyer')->middleware(['auth', 'control_admin']);
Route::get('/mailer', 'App\Http\Controllers\HomeController@mailer')->name('mailer')->middleware(['auth', 'control_admin']);
Route::post('/mailer', 'App\Http\Controllers\HomeController@mailer_post')->name('mailer_post')->middleware(['auth', 'control_admin']);
Route::get('/blogs', 'App\Http\Controllers\HomeController@blogs')->name('blogs');
Route::post('/blogs/create', 'App\Http\Controllers\HomeController@blogs_create')->name('blogs_create');
Route::post('/blogs/update', 'App\Http\Controllers\HomeController@blogs_update')->name('blogs_update');
Route::get('/blogs/delete/{unique_id}', 'App\Http\Controllers\HomeController@blogs_delete')->name('blogs_delete');



//these are user routes

Route::get('/', 'App\Http\Controllers\UserController@index')->name('index');
Route::get('/auth', 'App\Http\Controllers\UserController@auth')->name('auth');
Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');
Route::post('/register', 'App\Http\Controllers\UserController@register')->name('register');
Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('logout');
Route::get('/resource-center', 'App\Http\Controllers\UserController@resource_center')->name('resource_center');
Route::get('/store', 'App\Http\Controllers\UserController@store')->name('store');
Route::get('/store-details/{unique_id}', 'App\Http\Controllers\UserController@store_details')->name('store_details');
Route::post('/store-item/review', 'App\Http\Controllers\UserController@store_item_review')->name('store_item_review');
Route::get('/cart', 'App\Http\Controllers\UserController@cart')->name('cart');
Route::get('/checkout', 'App\Http\Controllers\UserController@checkout')->name('checkout');
Route::get('/report-sale', 'App\Http\Controllers\UserController@report_sale')->name('report_sale')->middleware(['auth']);
Route::get('/legal-event', 'App\Http\Controllers\UserController@legal_event')->name('legal_event');
Route::get('/legal-event-details/{unique_id}', 'App\Http\Controllers\UserController@legal_event_details')->name('legal_event_details');
Route::get('/legal-event-register', 'App\Http\Controllers\UserController@legal_event_register')->name('legal_event_register')->middleware(['auth']);
Route::get('/account', 'App\Http\Controllers\UserController@account')->name('account')->middleware(['auth']);
Route::post('/account', 'App\Http\Controllers\UserController@account_update')->name('account_update')->middleware(['auth']);
Route::get('/get-items', 'App\Http\Controllers\UserController@get_items')->name('get_items')->middleware(['auth']);
Route::get('/get-events', 'App\Http\Controllers\UserController@get_events')->name('get_events')->middleware(['auth']);
Route::get('/download-item', 'App\Http\Controllers\UserController@download_item')->name('download_item')->middleware(['auth']);
Route::get('/contact', 'App\Http\Controllers\UserController@contact')->name('contact');
Route::get('/find-lawyer', 'App\Http\Controllers\UserController@find_lawyer')->name('find_lawyer');
Route::get('/find-lawyer-details/{unique_id}', 'App\Http\Controllers\UserController@find_lawyer_details')->name('find_lawyer_details');
Route::get('/blog', 'App\Http\Controllers\UserController@blog')->name('blog');
Route::get('/blog-details/{url}', 'App\Http\Controllers\UserController@blog_details')->name('blog_details');
Route::get('/blog-comment-get', 'App\Http\Controllers\UserController@blog_comment_get')->name('blog_comment_get');
Route::get('/blog-comment', 'App\Http\Controllers\UserController@blog_comment')->name('blog_comment');