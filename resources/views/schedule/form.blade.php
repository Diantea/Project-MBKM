@extends('layouts.master')

@section('title')
    {{ $item ? 'Edit' : 'Tambah' }} Jadwal
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title d-flex align-items-center justify-content-between">
                            {{ $item ? 'Edit' : 'Tambah' }} Jadwal
                        </h4>

                        @include('layouts.alert')
                        <form action="{{ $item ? route('schedule.update', $item) : route('schedule.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($item)
                                @method('PUT')

                                <div class="form-group mb-2">
                                    <label class="form-label" for="id">Tempat Magang ID</label>
                                    <input type="text" class="form-control" id="id" value="#{{ $item->id }}" disabled/>
                                </div>

                            @endif

                            @if(auth()->user()->role === 'admin')
                                <div class="mb-2">
                                    <label for="lecturer_id" class="form-label">Dosen Pembimbing</label>
                                    <select name="lecturer_id" id="lecturer_id" class="selectpicker form-control" data-style="btn-default" data-live-search="true">
                                        @foreach(\App\Models\User::where('role', 'lecturer')->get() as $user)
                                            <option value="{{ $user->id }}" {{ isset($item) && $item->lecturer_id === $user->id ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <input type="hidden" name="lecturer_id" value="{{ auth()->user()->id }}">
                            @endif

                            @include('forms.textfield', ['label' => 'Ruangan', 'field' => 'room', 'type' => 'text'])

                            @include('forms.date', ['label' => 'Tanggal', 'field' => 'date'])

                            @include('forms.time', ['label' => 'Jam Mulai', 'field' => 'start'])

                            @include('forms.time', ['label' => 'Jam Selesai', 'field' => 'end'])

                            <div class="mt-4">
                                @if($item)
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                @endif
                                <a href="{{route('schedule.index')}}" type="submit" class="btn btn-label-primary ms-2"><i data-feather="back" class="avatar-icon"></i> Kembali</a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('js')
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script>
        $('.time').flatpickr({
            enableTime: true,
            dateFormat: 'H:i:s',
            noCalendar: true
        });

        $('.date').flatpickr({
            enableTime: false,
            dateFormat: 'Y-m-d',
            noCalendar: false
        });
    </script>
@endsection
