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

Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::get('/administration', 'HomeController@administration')->name('administration');
Route::get('/administration/{id}', 'HomeController@administrationSpecific')->name('administration.specific');
Route::post('/administration', 'HomeController@administrationSave')->name('administration.save');

// Nastavnik
Route::get('/tasks/new/{locale?}', 'TasksController@new')->name('task.new');
Route::post('/tasks/create', 'TasksController@create')->name('task.create');
Route::get('/tasks/list', 'TasksController@list')->name('task.list');
Route::get('/tasks/{id}', 'TasksController@specific')->name('task.specific');
Route::post('/tasks/approve', 'TasksController@approve')->name('task.approve');

// Student
Route::get('/student/list', 'TasksController@student')->name('student.list');
Route::post('/student/create', 'TasksController@enroll')->name('student.enroll');
Route::get('/student/preview/{id}', 'TasksController@studentPreiew')->name('student.preview');