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
Route::view('/login', 'auth.login')->name('login');
Route::post('/postLogin', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
/**
 * Role All
 */
Route::group(['middleware' => ['auth', 'checkRole:admin,siswa,guru']], function () {
    Route::view('/change_password', 'auth.change_password');
    Route::post('/postChangePassword', 'AuthController@changePassword');
});
/**
 * Role Siswa, Guru
 */
Route::group(['middleware' => ['auth', 'checkRole:siswa,guru']], function () {
    Route::view('/', 'welcome');
    Route::get('/student', 'StudentController@frontIndex');
    Route::get('/schedule', function () {
        return view('schedule');
    });
    Route::get('/announcement', function () {
        return view('announcement');
    });
    Route::get('/profile', function () {
        return view('profile');
    });
    Route::patch('/profile/update', 'AuthController@updateProfile');
});
/**
 * Role Admin
 */
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::view('/admin', 'admin.index');
    // Route::view('/admin/reference', 'admin.reference');
    // Route::view('/admin/student', 'admin.student');
    // Route::view('/admin/teacher', 'admin.teacher');
    // Route::view('/admin/course', 'admin.course');
    // Route::view('/admin/schedule', 'admin.schedule');

    // Class 
    Route::get('/admin/class', 'ClassController@index');
    Route::post('/admin/class/store', 'ClassController@store');
    Route::get('/admin/class/{class_id}/edit', 'ClassController@edit');
    Route::patch('/admin/class/{class_id}/update', 'ClassController@update');
    Route::get('/admin/class/{class_id}/delete', 'ClassController@destroy');

    // Student
    Route::get('/admin/student/', 'StudentController@index');
    Route::get('/admin/student/create', 'StudentController@create');
    Route::post('/admin/student/store', 'StudentController@store');
    Route::get('admin/student/{student_id}/edit', 'StudentController@edit');
    Route::patch('admin/student/{student_id}/update', 'StudentController@update');
    Route::get('/admin/student/{student_id}/delete', 'StudentController@destroy');

    // Teacher
    Route::get('/admin/teacher/', 'TeacherController@index');
    Route::get('/admin/teacher/create', 'TeacherController@create');
    Route::post('/admin/teacher/store', 'TeacherController@store');
    Route::get('admin/teacher/{teacher_id}/edit', 'TeacherController@edit');
    Route::patch('admin/teacher/{teacher_id}/update', 'TeacherController@update');
    Route::get('/admin/teacher/{teacher_id}/delete', 'TeacherController@destroy');
});
