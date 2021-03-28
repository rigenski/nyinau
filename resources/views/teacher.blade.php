@extends('layouts.front')

@section('content')
<section class="teachers py-5">
    <div class="container">
        <div class="title py-4">
            <h1 class="text-dark">Daftar Guru</h1>
        </div>
        <div class="body">
            <div class="row">
                @foreach($teachers as $teacher)
                <div class="teacher col-md-3 col-sm-4 mb-3 ">
                    <div class="card shadow" >
                        @if($teacher->image) 
                        <img src="{{ asset('img/' . $teacher->image ) }}" class="card-img-top" alt="...">
                        @else
                        <img src="{{ asset('/assets/img/dummy.png') }}" class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                          <h5 class="text-bold text-dark font-weight-bold">{{ $teacher->name }}</h5>
                          <h6>{{ $teacher->nis }}</h6>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection