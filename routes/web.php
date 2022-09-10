<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\courseController;

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
    return view('Instructor_module/index');
});

Route::get('/home_page', function () {
    return view('Instructor_module/home_page');
});

Route::get('/add_course', function () {
    return view('Instructor_module/add_course');
});
Route::post('/upload_course', [courseController::class, 'courseUpload'])->name('course.store');


Route::get('/manage_course', function () {
    return view('Instructor_module/manage_course');
});

Route::get('/home_page',[courseController::class, 'getRecords']);

Route::get('get_manage_course',[courseController::class, 'getRecordsMC']);

Route::get('file-upload/download/{file}', [courseController::class, 'fileDownload']);

Route::get('/courseM/{id}/edit', [courseController::class, 'updateCourse'])->name('course.update');

Route::get('/courseM/{id}/view', [courseController::class, 'courseView'])->name('course.view');

Route::get('/courseM/{id}/delete', [courseController::class, 'deleteCourse'])->name('course.destroy');

Route::post('/courseEdit/{id}', [courseController::class, 'editCourse'])->name('course.edit');

Route::post('/courseDelete/{id}', [courseController::class, 'destroyCourse'])->name('course.delete');
