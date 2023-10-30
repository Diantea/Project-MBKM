@extends('layouts.master')

@section('title')
    Laporan Harian
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @if(auth()->user()->role !== 'student')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title">Laporan Harian</h5>
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="datatables-basic table">
                                <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>MBKM</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $i => $student)
                                    <tr>
                                        <td class="text-center">{{ $i + 1 }}</td>
                                        <td>{{ $student->npm }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td><i class="ti ti-{{ $student->category->icon }} me-1"></i> {{ $student->category->name }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a href="{{ route('report.index_student', $student) }}" class="btn btn-outline-secondary rounded-pill btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                                <i class="ti ti-eye"></i>
                                            </a>
                                            <form action="{{ route('report.show', $student) }}" method="POST" id="form-delete-{{$student->id}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            @if(auth()->user()->role === 'student')
                                            <a href="{{ route('report.print', $student) }}" class="btn btn-outline-secondary rounded-pill btn-icon ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak Laporan">
                                                <i class="ti ti-printer"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    @include('report.report_by_student')
                </div>
            </div>
        @endif

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
