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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/eachattend/{id}','AdminController@addeachattend');
  Route::get('/addattendance/{id}','AdminController@addattend');
  Route::get('/posts/{id}','StudentController@viewpostbyone');
  Route::get('/groups/{id}','AdminController@viewpost');
  Route::get('/compose', 'AdminController@addmessage');
  Route::get('/select', 'AdminController@selectgroup');
Route::get('/addmarks/{id}', 'AdminController@studentmarks');
Route::get('/viewmsg', 'StudentController@viewpost');
Route::get('/addatt', 'AdminController@addattendance');
Route::get('/addmarks', 'AdminController@addmarks');

Route::get('/fileupload', 'AdminController@fileupload');

Route::get('/home', 'HomeController@index');
Route::get('/users/attendence','HomeController@viewAttendence');
Route::get('/users/marks','HomeController@viewMarks');
Route::get('/users/documents','HomeController@viewDocuments');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  Route::post('/msgcompose', 'AdminController@msgcompose')->name('admin.msg');
  Route::post('/attendance', 'AdminController@attendance')->name('admin.msg');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

  //Excel sheet importing routes
  Route::get('/importExport', 'MaatwebsiteDemoController@importExport');
  Route::get('/downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
  Route::post('/importExcel', 'MaatwebsiteDemoController@importExcel');
});