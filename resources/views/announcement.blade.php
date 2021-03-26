@extends('layouts.front')

@section('content')
<section class="students py-5">
    <div class="container">
        <div class="title py-4 d-flex justify-content-between">
            <h1 class="text-dark">Pengumuman</h1>
            <button type="button" class="btn btn-primary px-3 py-0" style="height:3em" data-toggle="modal" data-target="#staticBackdrop">
              <i class="fa fa-plus"></i>
            </button>
            
        </div>
        <div class="body">
            <div class="row">
                <div class="student col-md-4 mb-3 ">
                      <div class="card shadow ">
                        <img src="{{ asset('/assets/img/profile/11.jpg') }}"  class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold text-dark mb-0">Rakit PC</h5>
                          <small>10:21, 13 March 2021</small>
                          <p class="card-text mt-2">Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla porttitor accumsan tincidunt ...</p>
                          <a href="#" class="card-link">Detail</a>
                        </div>
                      </div>
                </div>
        </div>
    </div>
</section>

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
        <form action="/announcement" method="post">
          @csrf
            <div class="form-group">
              <label for="title">Judul</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul">
            </div>
            <div class="form-group">
              <label for="description">Deskripsi</label>
              <input type="password" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi">
            </div>
            <div class="form-group">
              <label for="image">Gambar</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Pilih Gambar</label>
              </div>
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