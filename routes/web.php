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

/**
 * Auth
 */
Route::view('/login', 'auth.login');
Route::post('/postLogin', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
/**
 * Role All
 */
Route::group(['middleware' => ['auth', 'checkRole:admin,siswa, guru']], function () {
    Route::view('/change_password', 'auth.change_password');
    Route::post('/postChangePassword', 'AuthController@changePassword');
});
/**
 * Role Siswa
 */
Route::group(['middleware' => ['auth', 'checkRole:siswa']], function () {
    Route::view('/', 'welcome');
});
/**
 * Role Admin
 */
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::view('/admin', 'admin.index');
    Route::view('/admin/reference', 'admin.reference');
    Route::view('/admin/student', 'admin.student');
    Route::view('/admin/teacher', 'admin.teacher');
    Route::view('/admin/course', 'admin.course');
    Route::view('/admin/schedule', 'admin.schedule');
});
