@extends('layouts.master')

@section('title')
    Penilaian
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-12">
                @include('layouts.profile', ['user' => $student])
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">
                    Penilaian Semester {{$student->semester}}
                </h5>
            </div>
            <div class="card-body">

               <div class="row">
                    <div class="col-md-6 col-12">

                        <form action="{{route('score.update', [$student->id])}}" method="POST">
                            @csrf
                            @method('PUT')

                            @foreach($student->category->courses()->where('semester', $student->semester)->get() as $course)
                            <div class="row mb-3 align-items-center">
                                <div class="col-4">{{ $course->name }}</div>
                                <div class="col-8">
                                    <input type="text" name="course_id[{{$course->id}}]" class="form-control" value="{{ $student->scores()->where('course_id', $course->id)->first()->score ?? null }}">
                                </div>
                            </div>
                            <hr>
                            @endforeach

                            <div class="row mb-3 align-items-center">
                                <div class="col-4">Jumlah</div>
                                <div class="col-8">
                                    <input type="text" class="form-control" value="{{$student->total_score}}" disabled>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-4"></div>
                                <div class="col-8">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                    <a href="{{route('score.index')}}" class="ms-4 text-primary">Kembali</a>
                                </div>
                            </div>
                        </form>

                    </div>
               </div>

            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script>
        $('.datatables-basic').DataTable()
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}" />
    <link rel="stylesheet" href="http://localhost:8000/assets/vendor/css/pages/page-profile.css" />
@endsection
