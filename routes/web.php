<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function()
{
//    Route::get('/', function()
//    {
//        return view('dashboard');
//    });
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//===============================Grades===========================
    Route::resource('Grades','GradeController');


    //===============================Classrooms===========================
    Route::resource('Classrooms','ClassroomController');
    Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
    Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');


    //==============================Sections============================
    Route::resource('sections','SectionController');
    Route::get('/classes/{id}', 'SectionController@getclasses');

    //==============================parents============================

    Route::view('add_parent','livewire.show_Form')->name('add_parent');

    //==============================Teacher============================
    Route::resource('Teachers','TeacherController');

//==============================Students============================
    Route::resource('Students', 'StudentController');
    Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
    Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
    Route::resource('Graduated', 'GraduatedController');
    Route::resource('Fees', 'FeeController');
    Route::resource('Fees_Invoices', 'FeeInvoiceController');
    Route::resource('receipt_students', 'ReceiptStudentsController');
    Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
    Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
    Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');


    Route::resource('Promotion', 'PromotionController');
});




