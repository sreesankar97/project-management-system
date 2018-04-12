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

Route::post('/teamconfirm','AdminController@teamconfirm');
Route::get('/guideeachmarks/{id}','FacultyController@addguidemarkseachstudent');
Route::post('/teamalloc','AdminController@teamalloc');
Route::post('/createguide','AdminController@createguide');
Route::get('createfaculty','AdminController@createfaculty');
Route::get('/teamapprove/{id}','AdminController@guidealloc');
Route::get('/formedteams/{id}','MaatwebsiteDemoController@viewteams');
Route::get('/viewfiles/{id}','AdminController@viewfileuploads');
Route::get('/viewfiles/{id}','AdminController@viewfileuploads');
Route::get('/guide/viewfile/selectgroup','FacultyController@guideviewfileselectgroup');
Route::get('/fileapprove/{id}','FacultyController@guidefileapprove');
Route::get('/filereject/{id}','FacultyController@guidefilereject');
Route::get('/guide/viewfiles/{id}','FacultyController@viewfileuploads');
Route::get('/guide/teamstatus','FacultyController@selectteamteamstatus');
Route::get('/teamstatus/{id}','FacultyController@addguidemarks');
Route::get('guidemarks/selectgroup','FacultyController@guidemarksselectgroup');
Route::get('addguidemarks/{id}','FacultyController@addguidemarks');
;
Route::get('/adminfileselectgroup','AdminController@fileuploadselectgroup');
Route::get('/proformaupload','studentController@fileup');
Route::get('/eachmarks/{id}','AdminController@marksadd');
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
Route::post('/firstreviewmarks', 'AdminController@firstreviewmarks')->name('admin.msg');
Route::post('/secondreviewmarks', 'AdminController@secondreviewmarks')->name('admin.msg');
Route::post('/finalreviewmarks', 'AdminController@finalreviewmarks')->name('admin.msg');
Route::post('/filerejectreason', 'FacultyController@filerejectreason');
Route::post('/guidemarksofstudent', 'FacultyController@guidemarksofstudent');
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
  Route::post('/addattendancestud', 'AdminController@addattendancestud')->name('admin.msg');
  Route::post('/studentfileupload', 'studentcontroller@studentfileupload');
  Route::get('/viewteamlist', 'MaatwebsiteDemoController@viewteamlist');
  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
  //Excel sheet importing routes
 Route::get('/importexport', 'MaatwebsiteDemoController@teamformation');
 Route::post('/team', 'MaatwebsiteDemoController@team');
  Route::get('/downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
  Route::post('/importExcel', 'MaatwebsiteDemoController@importExcel');
  //Sending mail
  Route::post('send','AdminController@send');
});
//Faculty Login
Route::prefix('faculty')->group(function() {
  Route::get('/login', 'Auth\FacultyLoginController@showLoginForm')->name('faculty.login');
  Route::post('/login', 'Auth\FacultyLoginController@login')->name('faculty.login.submit');
  Route::get('/','FacultyController@index')->name('faculty.dashboard');
});
