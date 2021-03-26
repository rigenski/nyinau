@extends('layouts.front')

@section('content')
<section class="students py-5">
    <div class="container">
        <div class="title py-4">
            <h1 class="text-dark">Daftar Siswa</h1>
        </div>
        <div class="body">
            <div class="row">
                @foreach($students as $student)
                <div class="student col-md-3 col-sm-4 mb-3 ">
                    <div class="card shadow" >
                        <img src="{{ asset('/assets/img/profile/1.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="text-bold text-dark font-weight-bold">{{ $student->name }}</h5>
                          <h6>{{ $student->nis }}</h6>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection