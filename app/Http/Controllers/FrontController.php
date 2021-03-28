<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use App\User;
use App\Day;
use App\Schedule;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{

    public function home()
    {
        if (auth()->user()->role == "guru") {

            $teachers = Teacher::where('user_id', auth()->user()->id)->get();
            foreach ($teachers as $teacher) {
                $class_id = $teacher->class_id;
            }
        }

        if (auth()->user()->role == "siswa") {

            $students = Student::where('user_id', auth()->user()->id)->get();
            foreach ($students as $student) {
                $class_id = $student->class_id;
            }
        }


        $announcements = Announcement::where('class_id', null)->get();
        $announcements2 = Announcement::where('class_id', $class_id)->get();

        if (auth()->user()->role == "siswa") {
            $student = Student::where('user_id', auth()->user()->id)->get();
            foreach ($student as $data) {
                $students = Student::where('class_id', $data->class_id)->get();
            }
        }
        if (auth()->user()->role == "guru") {
            $teacher = Teacher::where('user_id', auth()->user()->id)->get();
            foreach ($teacher as $data) {
                $students = Student::where('class_id', $data->class_id)->get();
            }
        }


        return view('home', compact('students', 'announcements', 'announcements2'));
    }

    public function student()
    {
        if (auth()->user()->role == "siswa") {
            $student = Student::where('user_id', auth()->user()->id)->get();
            foreach ($student as $data) {
                $students = Student::where('class_id', $data->class_id)->get();
            }
        }
        if (auth()->user()->role == "guru") {
            $teacher = Teacher::where('user_id', auth()->user()->id)->get();
            foreach ($teacher as $data) {
                $students = Student::where('class_id', $data->class_id)->get();
            }
        }

        return view('student', compact('students'));
    }

    public function teacher()
    {
        $teachers = Teacher::all();

        return view('teacher', compact('teachers'));
    }

    public function schedule()
    {
        if (auth()->user()->role == "guru") {

            $teachers = Teacher::where('user_id', auth()->user()->id)->get();
            foreach ($teachers as $teacher) {
                $class_id = $teacher->class_id;
            }
        }

        if (auth()->user()->role == "siswa") {

            $students = Student::where('user_id', auth()->user()->id)->get();
            foreach ($students as $student) {
                $class_id = $student->class_id;
            }
        }

        $days = Day::all();
        return view('schedule', compact('class_id', 'days'));
    }

    public function announcement()
    {
        if (auth()->user()->role == "guru") {

            $teachers = Teacher::where('user_id', auth()->user()->id)->get();
            foreach ($teachers as $teacher) {
                $class_id = $teacher->class_id;
            }
        }

        if (auth()->user()->role == "siswa") {

            $students = Student::where('user_id', auth()->user()->id)->get();
            foreach ($students as $student) {
                $class_id = $student->class_id;
            }
        }


        $announcements = Announcement::where('class_id', null)->get();
        $announcements2 = Announcement::where('class_id', $class_id)->get();

        return view('announcement', compact('announcements', 'announcements2'));
    }

    public function announcementStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $rand = Str::random(20);
        $teachers = Teacher::where('user_id', auth()->user()->id)->get();
        foreach ($teachers as $teacher) {
            $class_id = $teacher->class_id;
        }

        $announcement = Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'class_id' => $class_id
        ]);

        if ($request->hasFile('image')) {
            $nameImage = $rand . "." . $request->image->getClientOriginalExtension();
            $request->file('image')->move('img/', $nameImage);
            $announcement->image = $nameImage;
            $announcement->save();
        }


        return redirect('/announcement')->with('status', 'Pengumuman Berhasil Ditambahkan');
    }

    public function profile()
    {
        if (auth()->user()->role == "siswa") {
            $profile = Student::where('user_id', auth()->user()->id)->get();
        }
        if (auth()->user()->role == "guru") {
            $profile = Teacher::where('user_id', auth()->user()->id)->get();
        }
        return view('profile', ['profile' => $profile]);
    }

    public function profileUpdate(Request $request)
    {
        $rand = Str::random(20);

        $id = auth()->user()->id;

        if (auth()->user()->role == "siswa") {
            $students = Student::where('user_id', $id)->get();
            foreach ($students as $data) {
                $user = User::find($id);
                $user->update([
                    'name' => $request->name
                ]);
                $student = Student::find($data->id);
                $student->update([
                    'name' => $request->name
                ]);
                if ($request->hasFile('image')) {
                    $nameImage = $rand . "." . $request->image->getClientOriginalExtension();
                    $request->file('image')->move('img/', $nameImage);
                    $student->image = $nameImage;
                    $student->save();
                }
            }
            return redirect('/profile');
        }
        if (auth()->user()->role == "guru") {
            $teachers = Teacher::where('user_id', $id)->get();
            foreach ($teachers as $data) {
                $user = User::find($id);
                $user->update([
                    'name' => $request->name
                ]);
                $teacher = Teacher::find($data->id);
                $teacher->update([
                    'name' => $request->name
                ]);
                if ($request->hasFile('image')) {
                    $nameImage = $rand . "." . $request->image->getClientOriginalExtension();
                    $request->file('image')->move('img/', $nameImage);
                    $teacher->image = $nameImage;
                    $teacher->save();
                }
            }
            return redirect('/profile');
        }
        return redirect('/profile');
    }
}
