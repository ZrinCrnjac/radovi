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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::post('/login/custom', [
    'uses' => 'LoginController@login',
    'as' => 'login.custom'
]);*/

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'App\Http\Controllers\StudentController@showTasks')->name('home');
    Route::get('/admin', 'App\Http\Controllers\UserController@showUsers')->name('admin');
    Route::get('/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('edit');
    Route::post('/update', 'App\Http\Controllers\UserController@update')->name('update');
    Route::get('/nastavnik', 'App\Http\Controllers\NastavnikController@index')->name('nastavnik');
    Route::post('/nastavnik/task', 'App\Http\Controllers\NastavnikController@saveTask')->name('nastavnik.task');
    Route::get('/nastavnik/task/{id}/students', 'App\Http\Controllers\NastavnikController@showStudents')->name('nastavnik.task.students');
    Route::post('/nastavnik/task/{id}/student', 'App\Http\Controllers\NastavnikController@assignStudentTask')->name('nastavnik.task.student');
    Route::post('/student/task', 'App\Http\Controllers\StudentController@updateTasks')->name('student.task');

});
