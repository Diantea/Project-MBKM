@extends('layouts.master')

@section('title')
    Laporan Akhir
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title d-flex align-items-center justify-content-between">
                            Laporan Akhir
                        </h4>

                        @include('layouts.alert')
                        <form action="{{ $item ? route('last-report.update', $item) : route('last-report.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($item)
                                @method('PUT')

                                <div class="form-group mb-2">
                                    <label class="form-label" for="id">Laporan Akhir ID</label>
                                    <input type="text" class="form-control" id="id" value="#{{ $item->id }}" disabled/>
                                </div>

                            @endif

                            @include('forms.file', ['label' => 'Laporan Akhir MBKM', 'field' => 'file_1'])

                            @include('forms.file', ['label' => 'Powerpoint', 'field' => 'file_2'])

                            @include('forms.file', ['label' => 'Dokumentasi pendukung photo/video', 'field' => 'file_3'])

                            @include('forms.file', ['label' => 'Nilai Evaluasi Akhir Pembimbing Lapangan', 'field' => 'file_4'])

                            <div class="mt-4">
                                @if($item)
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                @endif
                                <a href="{{route('last-report.index')}}" type="submit" class="btn btn-label-primary ms-2"><i data-feather="back" class="avatar-icon"></i> Kembali</a>
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
