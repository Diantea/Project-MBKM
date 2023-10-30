@extends('layouts.master')

@section('title')
    Jadwal
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">
                    Daftar Jadwal
                </h5>
                @if(auth()->user()->role !== 'student')
                    <div>
                        <a href="{{ route('schedule.create') }}" class="btn btn-primary">
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
                        @if(auth()->user()->role !== 'lecturer')
                        <th>Dosen</th>
                        @endif
                        <th>Ruangan</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">Durasi</th>
                        @if(auth()->user()->role !== 'student')
                        <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $i => $schedule)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            @if(auth()->user()->role !== 'lecturer')
                                <td>{{ $schedule->lecturer->name }}</td>
                            @endif
                            <td>{{ $schedule->room }}</td>
                            <td class="text-center">{{ $schedule->date_display }}</td>
                            <td class="text-center">{{ $schedule->start_display }} - {{ $schedule->end_display }}</td>
                            <td class="text-center">{{ $schedule->duration }}</td>
                            @if(auth()->user()->role !== 'student')
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('schedule.edit', $schedule) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <a href="" class="btn btn-outline-secondary btn-post btn-icon rounded-pill" data-target="#form-delete-{{$schedule->id}}">
                                    <i class="ti ti-trash"></i>
                                </a>
                                <form action="{{ route('schedule.destroy', $schedule) }}" method="POST" id="form-delete-{{$schedule->id}}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                            @endif
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
