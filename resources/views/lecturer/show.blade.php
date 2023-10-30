@extends('layouts.master')

@section('title')
    Detail Dosen Pembimbing
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-12">
                @include('layouts.profile', ['user' => $lecturer])
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title">List Mahasiswa</h5>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#add-student-modal" class="btn btn-primary"><i class="ti ti-user me-1"></i> Tambah Mahasiswa</button>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table">
                            <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lecturer->students as $i => $student)
                                <tr>
                                    <td class="text-center">{{ $i + 1 }}</td>
                                    <td>{{ $student->npm }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td class="d-flex justify-content-center">
                                        <button class="btn btn-outline-danger rounded-pill btn-post btn-icon" data-target="#form-delete-{{$student->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove">
                                            <i class="ti ti-user-minus"></i>
                                        </button>
                                        <form action="{{ route('user.destroy', $student) }}" method="POST" id="form-delete-{{$student->id}}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="modal fade" id="add-student-modal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('lecturer.add_student', $lecturer) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Tambahkan Mahasiswa</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        ></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="student_id" class="form-label">MBKM</label>
                                                <input type="text" class="form-control" value="{{ $lecturer->category->name }}" disabled>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="student_id" class="form-label">Mahasiswa</label>
                                                <select name="student_id" id="student_id" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                                    @php
                                                        $students = collect($lecturer->category->students)->filter(function($student) use ($lecturer) {
                                                            return !in_array($student->id, collect($lecturer->students)->pluck('id')->values()->all());
                                                        })
                                                    @endphp
                                                    @foreach($students as $student)
                                                        <option value="{{ $student->id }}">
                                                            {{ $student->npm }} - {{ $student->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                            Batalkan
                                        </button>
                                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
@endsection
