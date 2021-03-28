@extends('layouts.front')

@section('content')
<section class="students py-5">
    <div class="container">
        <div class="title py-4">
            <h1 class="text-dark">Profile</h1>
        </div>
        <div class="body">
          <div class="row">
            {{-- <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card">
                    <div class="card-header">Foto Profil</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        @if(auth()->user()->image) 
                        <img class="img-account-profile w-100 rounded-circle mb-2 p-4" alt="">
                        @else
                        <img class="img-account-profile w-100 rounded-circle mb-2 p-4" src="{{asset('assets/img/profile/2.jpg')}}" alt="">
                        @endif
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG atau PNG tidak lebih dari 6mb</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload Gambar</button>
                    </div>
                </div>
            </div> --}}
            <div class="col">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Detail Akun</div>
                    <div class="card-body">
                        <form method="post" action="/profile/update" enctype="multipart/form-data">
                            @foreach($profile as $data)
                        <div class="row">
                            <div class="col-xl-4 text-center">
                                    @method('patch')
                                    @csrf
                                    @if($data->image) 
                                    <img class="img-account-profile w-100 rounded-circle mb-2 p-4" 
                                    src="{{ asset('img/' . $data->image ) }}" alt="">
                                     @else
                                    <img class="img-account-profile w-100 rounded-circle mb-0 p-4" src="{{asset('assets/img/dummy.png')}}" alt="">
                                    @endif
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-2">JPG atau PNG tidak lebih dari 6mb</div>
                                    <!-- Profile picture upload button-->
                                    <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="image" name="image">
                                          <label class="custom-file-label" for="image">Pilih Gambar</label>
                                    </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Form Group (username)-->
                                <h4 class="font-weight-bold text-dark mt-4">NIS : {{ auth()->user()->nis }}</h4>
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Nama Lengkap</label>
                                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" placeholder="Masukkan Nama Lengkap" name="name" value="{{ $data->name }}">
                                    @error('name') 
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>  
                                {{-- <div class="form-group">
                                    <label class="small mb-1" for="description">Deskripsi / Slogan</label>
                                    <textarea class="form-control" id="description" rows="3"></textarea>
                                </div> --}}
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                            </div> 
                        </div>
                        @endforeach
                    </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection