<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function index()
    {
        $class = Kelas::all();
        $announcements = Announcement::all();
        return view('admin.announcement.index', compact('announcements', 'class'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $rand = Str::random(20);

        $announcement = Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'class_id' => $request->class
        ]);

        if ($request->hasFile('image')) {
            $nameImage = $rand . "." . $request->image->getClientOriginalExtension();
            $request->file('image')->move('img/', $nameImage);
            $announcement->image = $nameImage;
            $announcement->save();
        }


        return redirect('/admin/announcement')->with('status', 'Pengumuman Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $announcement = Announcement::find($id);
        $class = Kelas::where('id', '!=', $announcement->class_id)->get();
        return view('/admin/announcement/update', compact('announcement', 'class'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        Announcement::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'class_id' => $request->class,
        ]);
        return redirect('/admin/announcement')->with('status', 'Pengumuman Berhasil Diubah');
    }

    public function destroy($id)
    {
        Announcement::find($id)->delete();
        return redirect('/admin/announcement')->with('status', 'Pengumuman Berhasil Dihapus !');
    }
}
