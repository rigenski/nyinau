@extends('layouts.app')

@section('title', 'Pengumuman')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
        Tambah Pengumuman
      </button>
    <!-- message -->
    @if(session('status'))
    <div class="alert alert-success m-0 alert-dismissable center" style="width:40em;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('status') }}
      </div>
    @endif
  </div>
  <div class="card-body">
   <!-- end message -->
   <div class="table-responsive">
     <table class="table table-bordered table-striped mt-4">
       <thead class="bg-primary text-white">
         <tr>
           <th>No</th>
           <th>Judul</th>
           <th>Untuk</th>
           <th>Waktu</th>
           <th style="text-align:center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($announcements as $announcement)
          <tr>
            <th>{{$loop->iteration}}</th>
            <td>{{$announcement->title}}</td>
            @if($announcement->class_id)
            <td>{{$announcement->class->name}}</td>
            @else
            <td>Semua Kelas</td>
            @endif
            <td>{{ date('d-m-Y h:i', strtotime($announcement->created_at)) }}</td>
            <td style="text-align:center">
              <a href="/admin/announcement/{{$announcement->id}}/edit" class="btn btn-success btn-sm mb-2" style="width:60px">Edit</a>
              <a href="/admin/announcement/{{$announcement->id}}/delete" class="btn btn-danger btn-sm mb-2" style="width:60px">
                Hapus
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Form Pengumuman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/admin/announcement/store" method="post" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul">
              </div>
              <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan Deskripsi"></textarea>
              </div>
              <div class="form-group">
                <label for="image">Gambar</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">Pilih Gambar</label>
                </div>
              </div>
              <div class="form-group">
                <label for="class">Kelas : </label>
                <select class="form-control" name="class" id="class">
                  <option value="">Semua</option>
                  @foreach($class as $kelas)
                  <option value="{{$kelas->id}}" {{old('class') == $kelas->id ? 'selected' : null}}>{{$kelas->name}}</option>
                  @endforeach
                </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
      </div>
    </div>
  </div>

 
@endsection