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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/student/info/{rollNumber}', 'HomeController@getStudentInfo')->name('get-student-info');
Route::post('/student/info/store', 'HomeController@storeStudentInfo')->name('info.store');
Route::post('/admit-card' , 'HomeController@getAdmitCard')->name('admit-card');
Route::get('/card/{rollNumber}/pdf', 'HomeController@getAdmitCardPdf')->name('admit-card.download');


Route::get('/login', 'AdminController@showLoginForm')->name('login');
Route::post('/login', 'AdminController@login')->name('login.post');
Route::post('/logout', 'AdminController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function () {
    // Specified Admin Routes

    Route::get('/admin', 'AdminController@getAdminPanel')->name('admin.dashboard');
    Route::get('/admin/exam-dates', 'AdminController@getExamDatePage')->name('exam-dates');

    Route::get('/admin/registered-students', 'AdminController@getRegisteredStudentsPage')->name('admin.registered-students');
    Route::get('/admin/registered-students/edit/{id}', 'AdminController@getRegisteredStudentEditPage')->name('admin.getRegisteredStudentEditPage');
    Route::get('/admin/registered-students/view/{id}', 'AdminController@getRegisteredStudentShowPage')->name('admin.getRegisteredStudentShowPage');
    Route::post('/admin/registered-students/update', 'AdminController@registeredStudentUpdate')->name('admin.registeredStudentUpdate');
    Route::post('/admin/registered-students/delete', 'AdminController@registeredStudentDelete')->name('admin.registeredStudentDelete');

    Route::get('/admin/general-students', 'AdminController@getGeneralStudentsPage')->name('admin.general-students');
    Route::get('/admin/general-students/create', 'AdminController@getGeneralStudentCreatePage')->name('admin.getGeneralStudentCreatePage');
    Route::post('/admin/general-students/create', 'AdminController@createGeneralStudent')->name('admin.createGeneralStudent');
    Route::get('/admin/general-students/view/{id}', 'AdminController@getGeneralStudentShowPage')->name('admin.getGeneralStudentShowPage');    
    Route::get('/admin/general-students/edit/{id}', 'AdminController@getGeneralStudentEditPage')->name('admin.getGeneralStudentEditPage');
    Route::post('/admin/general-students/update', 'AdminController@generalStudentUpdate')->name('admin.generalStudentUpdate');
    Route::post('/admin/general-students/delete', 'AdminController@generalStudentDelete')->name('admin.generalStudentDelete');
    

    Route::post('/admin/exam-date/save', 'AdminController@saveExamDates')->name('admin.save-exam-dates');
    Route::post('/upload-csv', 'AdminController@getCSVData')->name('upload-csv');
});
