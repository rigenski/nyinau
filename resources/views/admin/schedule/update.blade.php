@extends('layouts.app')

@section('title', 'Ubah Jadwal')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Jadwal / Ubah Jadwal</h6>
  </div>
  <div class="card-body">
    <form action="/admin/schedule/{{$schedule->id}}/update" method="POST">
    @method('patch')
      @csrf
          <div class="form-group">
          <label for="course_id">Mata Pelajaran : </label>
          <select class="form-control @error('course_id') is-invalid @enderror" name="course_id" id="course_id">
          <option value="{{ $schedule->course->id }}">{{ $schedule->course->name }}</option>
            @foreach($courses as $course)
            <option value="{{$course->id}}">{{$course->name}}</option>
            @endforeach
          </select>
          @error('course_id') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>
      
          <div class="form-group">
            <label for="start_time">Jam Mulai : </label>
            <select class="form-control @error('start_time') is-invalid @enderror" name="start_time" id="start_time">
              <option value="{{ $schedule->start_time }}">{{date('h:i', strtotime($schedule->start_time))}}</option>
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
              <option value="{{ $schedule->end_time }}">{{date('h:i', strtotime($schedule->end_time))}}</option>
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
          <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
  </div>
</div>
@endsection