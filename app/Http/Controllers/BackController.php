<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\Course;
use App\Kelas;
use Illuminate\Http\Request;

class BackController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $class = Kelas::all();
        $courses = Course::all();
        return view('admin.home.index', compact('students', 'teachers', 'class', 'courses'));
    }
}
