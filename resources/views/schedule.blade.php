@extends('layouts.front')

@section('content')
<section class="schedules py-5">
    <div class="container">
        <div class="title py-4 d-flex justify-content-center">
            <h1 class="text-dark">Jadwal Pelajaran</h1>
        </div>
        <div class="schedule mt-4">
            @foreach($days as $day)
            <h4 class="mb-0 mt-2">{{$day->name}}</h4>
            <div class="table-responsive">
                <table class="table table-striped mt-4">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($day->schedule->where('class_id', $class_id)->sortBy('start_time') as $schedule)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$schedule->course->name}}</td>
                            <td>{{date('h:i', strtotime($schedule->start_time)) . ' - ' . date('h:i', strtotime($schedule->end_time))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection