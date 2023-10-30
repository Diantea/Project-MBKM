@extends('layouts.master')

@section('title')
    Tempat Magang
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @if(auth()->user()->role === 'student')
            @include('layouts.submission_alert')
        @else
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-0">Overview</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">

                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="ti ti-building-community ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ $companies_active->count() }}</h5>
                                    <small>Tempat Magang</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">
                    Tempat Magang
                </h5>
                @if(auth()->user()->role !== 'student')
                <div>
                    <a href="{{ route('company.create') }}" class="btn btn-primary">
                        Tambah
                    </a>
                </div>
                @endif
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Perusahaan</th>
                        <th class="text-center">Maksimal</th>
                        <th class="text-center">Diterima</th>
                        @if(auth()->user()->role === 'admin')
                        <th class="text-center">Surat Pengantar</th>
                        <th class="text-center">Kontrak Kerja</th>
                        @endif
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($companies_active as $i => $company)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $company->name }}</td>
                            <td class="text-center">{{ $company->max }}</td>
                            <td class="text-center">{{$company->internships()->where('status', 'accepted')->count()}} </td>
                            @if(auth()->user()->role === 'admin')
                                <td class="text-center">
                                    @if($company->file_1)
                                    <a href="{{ $company->file_1_url }}" download="Surat Pengantar_{{ $company->name }}" class="btn btn-label-secondary btn-icon rounded-pill ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Surat Pengantar">
                                        <i class="ti ti-download"></i>
                                    </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($company->file_2)
                                        <a href="{{ $company->file_2_url }}" download="Kontrak Kerja_{{ $company->name }}" class="btn btn-label-secondary btn-icon rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Kontrak Kerja">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                            @endif
                            <td class="d-flex justify-content-center">
                                @if(auth()->user()->role === 'student')
                                    @if($company->internships()->where('status', 'accepted')->count() >= $company->max)
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Sudah Full">
                                        <button type="button" class="btn btn-outline-secondary btn-icon rounded-pill" disabled>
                                            <i class="ti ti-arrow-bar-to-right"></i>
                                        </button>
                                    </div>
                                    @else
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="{{ auth()->user()->on_internship ? 'Kamu telah mendaftar' : 'Daftar' }}">
                                        <a href="" data-target="#form-register-{{$company->id}}" class="btn btn-outline-primary btn-icon rounded-pill btn-post {{ auth()->user()->on_internship ? 'disabled' : '' }}">
                                            <i class="ti ti-arrow-bar-to-right"></i>
                                        </a>
                                    </div>
                                    <form action="{{ route('company.register_company') }}" method="POST" id="form-register-{{$company->id}}">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                                    </form>
                                    @endif
                                @else
                                    <a href="{{ route('company.show', $company) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                        <i class="ti ti-eye"></i>
                                    </a>
                                    <a href="{{ route('company.edit', $company) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </a>
                                    <a href="" data-target="#btn-delete-{{ $company->id }}" class="btn-post btn btn-outline-secondary btn-icon rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                    <form id="btn-delete-{{ $company->id }}" action="{{ route('company.destroy', $company) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
@endsection
