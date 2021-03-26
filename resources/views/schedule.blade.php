@extends('layouts.front')

@section('content')
<section class="schedules py-5">
    <div class="container">
        <div class="title py-4 d-flex justify-content-center">
            <h1 class="text-dark">Daftar Pelajaran</h1>
        </div>
        <div class="body">
            <div class="schedule mt-4">
                <h4 class="mb-0">Senin</h4>
                <div class="table-responsive">
                    <table class="table table-striped mt-3">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Jam Mulai</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($students as $student) --}}
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                 </table>
                </div>
                </div>
            <div class="schedule mt-4">
                <h4 class="mb-0">Senin</h4>
                <div class="table-responsive">
                    <table class="table table-striped mt-3">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Jam Mulai</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($students as $student) --}}
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                 </table>
                </div>
                </div>
            <div class="schedule mt-4">
                <h4 class="mb-0">Senin</h4>
                <div class="table-responsive">
                    <table class="table table-striped mt-3">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Jam Mulai</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($students as $student) --}}
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>Matematika</td>
                                <td>08:00 - 09:30</td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                 </table>
                </div>
                </div>
            </div>
</section>
@endsection