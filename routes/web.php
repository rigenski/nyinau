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

Route::view('/', 'welcome');
Route::view('/admin', 'admin.index');
Route::view('/admin/reference', 'admin.reference');
Route::view('/admin/student', 'admin.student');
Route::view('/admin/teacher', 'admin.teacher');
Route::view('/admin/course', 'admin.course');
Route::view('/admin/schedule', 'admin.schedule');
