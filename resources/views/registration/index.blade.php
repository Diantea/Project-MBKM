@extends('layouts.master')

@section('title')
    Registration
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

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
                            <div class="badge rounded-pill bg-label-secondary me-3 p-2">
                                <i class="ti ti-user-off ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $students_inactive->count() }}</h5>
                                <small>Non Aktif</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-success me-3 p-2">
                                <i class="ti ti-user-check ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $students_active->count() }}</h5>
                                <small>Aktif</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <a href="{{ route('registration.index', ['filter' => 'inactive']) }}" class="btn btn{{ request()->get('filter') === 'active' ? '-outline' : '' }}-primary rounded-pill me-2">Non-Aktif</a>
                <a href="{{ route('registration.index', ['filter' => 'active']) }}" class="btn btn{{ request()->get('filter') !== 'active' ? '-outline' : '' }}-primary rounded-pill">Aktif</a>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th class="text-center">NPM/NIDN</th>
                        <th class="text-center">Semester</th>
                        <th>MBKM</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach((request()->get('filter') === 'active' ? $students_active : $students_inactive) as $i => $student)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td class="text-center">{{ $student->npm }}</td>
                            <td class="text-center">{{ $student->semester }}</td>
                            <td><i class="ti ti-{{ $student->category->icon }} me-1"></i> {{ $student->category->name }}</td>
                            <td class="text-center d-flex justify-content-center">
                                @if(request()->get('filter') !== 'active')
                                    <button class="btn btn-outline-success btn-post rounded-pill btn-icon" data-target="#form-active-{{$student->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Aktifkan">
                                        <i class="ti ti-user-check"></i>
                                    </button>
                                    <form action="{{ route('registration.update', $student) }}" method="POST" id="form-active-{{$student->id}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="active">
                                    </form>
                                @else
                                    <button class="btn btn-outline-secondary btn-post rounded-pill btn-icon" data-target="#form-deactive-{{$student->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Nonaktifkan">
                                        <i class="ti ti-user-off"></i>
                                    </button>
                                    <form action="{{ route('registration.update', $student) }}" method="POST" class="me-2" id="form-deactive-{{$student->id}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="inactive">
                                    </form>
                                    <button class="btn btn-outline-secondary btn-post rounded-pill btn-icon" data-target="#form-delete-{{$student->id}}">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                    <form action="{{ route('registration.destroy', $student) }}" method="POST" id="form-delete-{{$student->id}}">
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
