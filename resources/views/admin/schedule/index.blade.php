@extends('layouts.app')

@section('title', 'Jadwal Pelajaran ')

@section('main')
</form>
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <div class="d-flex">
      <a href="/admin/schedule/create" class="btn btn-primary mr-4" >Tambah Data Jadwal</a>
      <div class="div">

        <select onchange="checkClass(event)" class="form-control @error('class') is-invalid @enderror" name="class" id="class">
          <option value="">Pilih Kelas ...</option>
          @foreach($class as $kelas)
          <option value="{{$kelas->id}}">
            {{$kelas->name}}
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
      <div class="d-flex justify-content-center align-items-center" style="height:60vh">
        <h4>Pilih Kelas terlebih dahulu</h4>
      </div>
  </div>
</div>

 
@endsection