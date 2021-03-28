<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Day;
use App\Schedule;
use App\Kelas;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        $days = Day::all();
        $courses = Course::all();
        $class = Kelas::all();
        return view('admin.schedule.index', compact('schedules', 'days', 'courses', 'class'));
    }

    public function detail($class_id)
    {
        $days = Day::all();
        $schedules = Schedule::where('class_id', $class_id)->get();
        $class = Kelas::find($class_id);
        $kelas = Kelas::where('id', '!=', $class_id)->get();
        return view('admin.schedule.detail', compact('class_id', 'days', 'class', 'kelas', 'schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $days = Day::all();
        $class = Kelas::all();
        return view('admin.schedule.create', compact('courses', 'days', 'class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'course' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        Schedule::create([
            'course_id' => $request->course,
            'day_id' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'class_id' => $request->class,
        ]);
        return redirect('/admin/schedule/class/' . $request->class)->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $courses = Course::where('id', '!=', $schedule->course->id)->get();
        return view('/admin/schedule/update', compact('schedule', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        $schedule = Schedule::find($id);
        Schedule::find($id)->update($request->all());
        return redirect('/admin/schedule/class/' . $schedule->class_id)->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect('/admin/schedule')->with('status', 'Data Berhasil Dihapus !');
    }
}
