@extends('layouts.master')

@section('title')
    Laporan harian {{ $student->name }}
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            @if(auth()->user()->role !== 'student')
                <div class="col-12">
                    @include('layouts.profile', ['user' => $student])
                </div>
            @endif

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Laporan Harian</h4>
                    </div>
                    <div class="card-body">
                        <div class="meta mb-4">
                            <h6 class="mb-2">Tanggal Kegiatan</h6>
                            <div class="text-muted d-flex align-items-center">
                                <span class="d-flex align-items-center">
                                    <i class="ti ti-calendar me-1"></i>
                                    {{ $report->date_display }}
                                </span>
                                <span class="ms-3 d-flex align-items-center">
                                    <i class="ti ti-clock me-1"></i>
                                    {{ $report->start_display }} s.d. {{ $report->end_display }}
                                </span>
                            </div>
                        </div>

                        <div class="description mb-4">
                            <h6 class="mb-1">Deskripsi</h6>
                            <div class="text-muted">
                                {{ $report->description }}
                            </div>
                        </div>

                        <div class="photo mb-2">
                            <h6 class="mb-2">Foto Kegiatan</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ $report->photo_url }}" alt="foto kegiatan" class="w-100">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ auth()->user()->role !== 'student' ? route('report.index_student', $student) : route('report.index') }}" class="btn btn-primary">Kembali</a>
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
