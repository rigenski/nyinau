@extends('layouts.app')

@section('title', 'Pengumuman')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Ubah Pengumuman</h6>
  </div>
  <div class="card-body">
    <form action="/admin/announcement/{{$announcement->id}}/update" method="POST" enctype="multipart/form-data">
      @method('patch')
      @csrf
      <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul" value="{{$announcement->title}}">
      </div>
      <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan Deskripsi">{{$announcement->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="class">Kelas : </label>
        <select class="form-control" name="class" id="class">
          @if($announcement->class_id)
          <option value="{{$announcement->class_id}}">{{$announcement->class->name}}</option>
          @endif
          <option value="">Semua</option>
          @foreach($class as $kelas)
          <option value="{{$kelas->id}}" {{old('class') == $kelas->id ? 'selected' : null}}>{{$kelas->name}}</option>
          @endforeach
        </select>
        </div>
          <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
  </div>
</div>

 
@endsection