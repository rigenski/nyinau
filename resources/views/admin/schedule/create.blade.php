@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Jadwal / Tambah Jadwal</h6>
  </div>
  <div class="card-body">
    <form action="/admin/schedule/store" method="POST">
      @csrf
          <div class="form-group">
          <label for="course">Mata Pelajaran : </label>
          <select class="form-control @error('course') is-invalid @enderror" name="course" id="course">
            <option value="">Masukan Mata Pelajaran</option>
            @foreach($courses as $course)
            <option value="{{$course->id}}" {{old('course') == $course->id ? 'selected' : null}}>{{$course->name}}</option>
            @endforeach
          </select>
          @error('course') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>
      
          <div class="form-group">
          <label for="class">Kelas : </label>
          <select class="form-control @error('class') is-invalid @enderror" name="class" id="class">
            <option value="">Masukan Kelas</option>
            @foreach($class as $kelas)
            <option value="{{$kelas->id}}" {{old('class') == $kelas->id ? 'selected' : null}}>{{$kelas->name}}</option>
            @endforeach
          </select>
          @error('class') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>
          <div class="form-group">
          <label for="day">Hari : </label>
          <select class="form-control @error('course') is-invalid @enderror" name="day" id="day">
            <option value="">Masukan Hari</option>
            @foreach($days as $day)
            <option value="{{$day->id}}" {{old('day') == $day->id ? 'selected' : null}}>{{$day->name}}</option>
            @endforeach
          </select>
          @error('day') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>
          <div class="form-group">
          <label for="start_time">Jam Mulai : </label>
          <select class="form-control @error('start_time') is-invalid @enderror" name="start_time" id="start_time">
            <option value="07:00">07:00</option>
            <option value="07:45">07:45</option>
            <option value="08:30">08:30</option>
            <option value="09:15">09:15</option>
            <option value="10:00">10:00</option>
            <option value="10:45">10:45</option>
            <option value="11:30">11:30</option>
            <option value="12:15">12:15</option>
            <option value="13:00">13:00</option>
            <option value="13:45">13:45</option>
            <option value="14:30">14:30</option>
            <option value="15:15">15:15</option>
          </select>
          @error('start_time') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>
          <div class="form-group">
          <label for="end_time">Jam Akhir : </label>
          <select class="form-control @error('end_time') is-invalid @enderror" name="end_time" id="end_time">
            <option value="07:45">07:45</option>
            <option value="08:30">08:30</option>
            <option value="09:15">09:15</option>
            <option value="10:00">10:00</option>
            <option value="10:45">10:45</option>
            <option value="11:30">11:30</option>
            <option value="12:15">12:15</option>
            <option value="13:00">13:00</option>
            <option value="13:45">13:45</option>
            <option value="14:30">14:30</option>
            <option value="15:15">15:15</option>
            <option value="16:00">16:00</option>
          </select>
          @error('end_time') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
  </div>
</div>
@endsection