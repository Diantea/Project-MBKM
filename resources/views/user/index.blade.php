@extends('layouts.master')

@section('title')
    Pengguna
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
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-user ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $data['admins']->count() }}</h5>
                                <small>Administrator</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-user ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $data['heads']->count() }}</h5>
                                <small>Kaprodi</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-user ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $data['lecturers']->count() }}</h5>
                                <small>Dosen Pembimbing</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                <i class="ti ti-user ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ $data['students']->count() }}</h5>
                                <small>Mahasiswa</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <a href="{{ route('user.index') }}" class="btn btn{{ request()->get('role') ? '-outline' : '' }}-primary rounded-pill me-2">Semua</a>
                    <a href="{{ route('user.index', ['role' => 'admins']) }}" class="btn btn{{ request()->get('role') !== 'admins' ? '-outline' : '' }}-primary rounded-pill me-2">Administrator</a>
                    <a href="{{ route('user.index', ['role' => 'heads']) }}" class="btn btn{{ request()->get('role') !== 'heads' ? '-outline' : '' }}-primary rounded-pill me-2">Kaprodi</a>
                    <a href="{{ route('user.index', ['role' => 'lecturers']) }}" class="btn btn{{ request()->get('role') !== 'lecturers' ? '-outline' : '' }}-primary rounded-pill me-2">Dosen Pembimbing</a>
                    <a href="{{ route('user.index', ['role' => 'students']) }}" class="btn btn{{ request()->get('role') !== 'students' ? '-outline' : '' }}-primary rounded-pill me-2">Mahasiswa</a>
                </div>
                <div>
                    <a href="{{ route('user.create') }}" class="btn btn-primary">
                        <i class="ti ti-user-plus me-2"></i> Tambah
                    </a>
                </div>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data[request()->get('role') ? request()->get('role') : 'all'] as $i => $user)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center text-capitalize">{{ $user->role }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('user.reset-password', $user) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password">
                                    <i class="ti ti-lock"></i>
                                </a>
                                <a href="{{ route('user.show', $user) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                    <i class="ti ti-eye"></i>
                                </a>
                                <a href="{{ route('user.edit', ['user' => $user, 'role' => $user->role]) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="" class="btn btn-outline-secondary btn-post btn-icon rounded-pill" data-target="#form-delete-{{$user->id}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                    <i class="ti ti-user-minus"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user) }}" method="POST" id="form-delete-{{$user->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
