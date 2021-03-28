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
    Route::get('/', 'FrontController@home');
    Route::get('/student', 'FrontController@student');
    Route::get('/schedule', 'FrontController@schedule');
    Route::get('/announcement', 'FrontController@announcement');
    Route::post('/announcement/store', 'FrontController@announcementStore');
    Route::get('/profile', 'FrontController@profile');
    Route::patch('/profile/update', 'FrontController@profileUpdate');
});

/**
 * Role Guru
 */
Route::group(['middleware' => ['auth', 'checkRole:guru']], function () {
    Route::get('/teacher', 'FrontController@teacher');
});
/**
 * Role Admin
 */
Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/admin', 'BackController@index');

    // Announcement
    Route::get('/admin/announcement', 'AnnouncementController@index');
    Route::post('/admin/announcement/store', 'AnnouncementController@store');
    Route::get('/admin/announcement/{announcement_id}/edit', 'AnnouncementController@edit');
    Route::patch('/admin/announcement/{announcement_id}/update', 'AnnouncementController@update');
    Route::get('/admin/announcement/{announcement_id}/delete', 'AnnouncementController@destroy');

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

    // Course
    Route::get('/admin/course', 'CourseController@index');
    Route::post('/admin/course/store', 'CourseController@store');
    Route::get('/admin/course/{course}/edit', 'CourseController@edit');
    Route::patch('/admin/course/{course_id}/update', 'CourseController@update');
    Route::get('/admin/course/{course_id}/delete', 'CourseController@destroy');

    // Schedule
    Route::get('/admin/schedule/', 'ScheduleController@index');
    Route::get('/admin/schedule/class/{class_id}', 'ScheduleController@detail');
    Route::get('/admin/schedule/create', 'ScheduleController@create');
    Route::post('/admin/schedule/store', 'ScheduleController@store');
    Route::get('/admin/schedule/{schedule}/edit', 'ScheduleController@edit');
    Route::patch('admin/schedule/{schedule_id}/update', 'ScheduleController@update');
    Route::get('/admin/schedule/{schedule_id}/delete', 'ScheduleController@destroy');
});
