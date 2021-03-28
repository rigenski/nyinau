@extends('layouts.front')

@section('content')
<div class="container">
<section class="students py-5">
        <div class="title py-4 d-flex justify-content-center">
            <h2 class="text-dark">Daftar Pengumuman</h2>
        </div>
        <div class="body">
            <div class="row">
                <?php $count = 0; ?>
                @foreach($announcements->merge($announcements2)->sortBy('created_at')->reverse() as $announcement)
                <?php if($count == 8) break; ?>
                <div class="student  col-md-3 col-sm-4  mb-3 ">
                    <div class="card shadow ">
                        @if($announcement->image)
                        <img src="{{ asset('/img/' . $announcement->image) }}"  class="card-img-top" style="max-height:10em;">
                        @else
                        <img src="{{ asset('/assets/img/dummy2.png') }}"  class="card-img-top" style="max-height:10em;">
                        @endif
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold text-dark mb-0">{{$announcement->title}}</h5>
                          <small>
                            {{ $announcement->class_id ? 'Guru' : 'Admin' . ' ~ ' . date('d:m:y h:i', strtotime($announcement->created_at))}}
                          </small>
                          <p class="card-text mt-2">{{Illuminate\Support\Str::limit($announcement->description, 60)}}</p>
                          <a href="#" class="card-link">Detail</a>
                        </div>
                      </div>
                </div>
                <?php $count++ ?>
                @endforeach
            </div>
        </div>
        <div class="footer d-flex justify-content-end mt-4">
            <h6><a href="/announcement">Lihat Selengkapnya</a></h6>
        </div>
</section>
<section class="students py-5">
        <div class="title py-4 d-flex justify-content-center">
            <h2 class="text-dark">Daftar Siswa</h2>
        </div>
        <div class="body">
            <div class="row">
                <?php $no = 0; ?>
                @foreach($students as $student)
                <?php if($no == 8) break; ?>
                <div class="student  col-md-3 col-6 col-sm-4 mb-3 ">
                    <div class="card shadow" >
                        @if($student->image) 
                        <img src="{{ asset('img/' . $student->image ) }}" class="card-img-top" alt="...">
                        @else
                        <img src="{{ asset('/assets/img/dummy.png') }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                          <h6 class="text-bold text-dark font-weight-bold mb-0">{{ $student->name }}</h6>
                          <p class="my-0">{{ $student->nis }}</p>
                        </div>
                      </div>
                </div>
                <?php $no++ ?>
                @endforeach
            </div>
        </div>
        <div class="footer d-flex justify-content-end mt-4">
            <h6><a href="/student">Lihat Selengkapnya</a></h6>
        </div>
</section>
</div>
@endsection