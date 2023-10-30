@extends('layouts.master')

@section('title')
    Laporan akhir {{ $student->name }}
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
                        <h4 class="card-title">Laporan Akhir</h4>
                    </div>
                    <div class="card-body">
                        <div class="meta mb-4">
                            <h6 class="mb-2">Tanggal</h6>
                            <div class="text-muted d-flex align-items-center">
                                <span class="d-flex align-items-center">
                                    <i class="ti ti-calendar me-1"></i>
                                    {{ $report->date_display }}
                                </span>
                            </div>
                        </div>

                        @php
                        $names = [
                            'Laporan Akhir MBKM',
                            'Powerpoint',
                            'Dokumentasi pendukung photo/video',
                            'Nilai Evaluasi Akhir Pembimbing Lapangan'
                        ];
                        @endphp

                        @foreach($names as $name)
                            @php
                            $file = $report->files()->where('name', $name)->first();
                            @endphp
                            <div class="photo mb-4">
                                <h6 class="mb-1">{{ $name }}</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        @if(!in_array($file->type, ['jpg', 'png', 'jpeg', 'svg', 'gif']))
                                            <a href="{{ $file->file_url }}" download="{{ $file->name }}.{{ $file->type }}" class="btn btn-label-primary waves-effect waves-light">
                                                <span class="ti-xs ti ti-download me-1"></span>Download file
                                            </a>
                                        @else
                                            <img src="{{ $file->file_url }}" alt="foto kegiatan" class="w-100">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="card-footer">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
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
