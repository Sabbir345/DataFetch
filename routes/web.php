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
Route::get('/logout', 'AdminController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function () {
    // Specified Admin Routes

    Route::get('/admin', 'AdminController@getAdminPanel')->name('admin.dashboard');
    Route::get('/admin/exam-dates', 'AdminController@getExamDatePage')->name('exam-dates');
    Route::get('/admin/registered-students', 'AdminController@getRegisteredStudentsPage')->name('admin.registered-students');
    Route::get('/admin/general-students', 'AdminController@getGeneralStudentsPage')->name('admin.general-students');
    Route::post('/admin/exam-date/save', 'AdminController@saveExamDates')->name('admin.save-exam-dates');

    Route::post('/upload-csv', 'AdminController@getCSVData')->name('upload-csv');
    Route::get('/students', 'AdminController@getStudents')->name('get_students');
    Route::get('/registered/students', 'AdminController@getRegisteredStudents')->name('get_registered_students');
    Route::get('/students/{roll_number}', 'AdminController@getSingleStudent')->name('get_single_student');
    Route::get('/registered/students/{id}', 'AdminController@getSingleRegisteredStudents')->name('get_single_registered_students');
});
