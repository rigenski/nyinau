@extends('layouts.app')

@section('title', 'Jadwal Kelas ' . $class->find($class_id)->name)

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <div class="d-flex">
      <a href="/admin/schedule/create" class="btn btn-primary mr-4" >Tambah Data Jadwal</a>
      <div class="div">

        <select onchange="checkClass(event)" class="form-control @error('class') is-invalid @enderror" name="class" id="class">
          <option value="{{$class->id}}">{{$class->name}}</option>
          @foreach($kelas as $class)
          <option value="{{$class->id}}">
            {{$class->name}}
          </option>
          @endforeach
        </select>
      </div>
    </div>
    <!-- message -->
    @if(session('status'))
    <div class="alert alert-success m-0 alert-dismissable center" style="width:40em;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('status') }}
      </div>
    @endif
  </div>

  <div class="card-body ">
  @if($schedules->count())
  @foreach($days as $day)
  <h4 class="mb-0 mt-2">{{$day->name}}</h4>
  <div class="table-responsive">
   <table class="table table-bordered table-striped mt-4">
 
    <thead class="bg-primary text-white">
        <tr>        
        <th>No</th>
        <th>Mata Pelajaran</th>
        <th>Waktu</th>
        <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
   
    <tbody>
    @foreach($day->schedule->where('class_id', $class_id)->sortBy('start_time') as $schedule)
      <tr>
        <th>{{$loop->iteration}}</th>
      <td>{{$schedule->course->name}}</td>
          <td>{{date('h:i', strtotime($schedule->start_time)) . ' - ' . date('h:i', strtotime($schedule->end_time))}}</td>
          <td style="text-align:center">
                <a href="/admin/schedule/{{$schedule->id}}/edit" class="btn btn-success btn-sm mb-2" style="width:60px">Edit</a>
                <a href="/admin/schedule/{{$schedule->id}}/delete" class="btn btn-danger btn-sm mb-2" style="width:60px">
                  Hapus
                </a>
            </td>   
      </tr>
     @endforeach
    
    </tbody>
  </table>
</div>
  @endforeach 
  @else
  <div class="d-flex justify-content-center align-items-center" style="height:60vh">
    <h4>Tambah Jadwal Pelajaran Terlebih Dahulu</h4>
  </div>
  @endif
  </div>
</div>

 
@endsection