@extends('layouts.master')

@section('title')
    Tambah Informasi
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title d-flex align-items-center justify-content-between">
                            {{ $item ? 'Edit' : 'Tambah' }} Informasi
                        </h4>
 
                        @include('layouts.alert')
                        <form action="{{ $item ? route('information.update', $item) : route('information.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($item)
                                @method('PUT')

                                <div class="form-group mb-2">
                                    <label class="form-label" for="id">Informasi ID</label>
                                    <input type="text" class="form-control" id="id" value="#{{ $item->id }}" disabled />
                                </div>

                            @endif

                            @include('forms.textfield', ['label' => 'Judul', 'field' => 'title', 'type' => 'text'])

                            @include('forms.textarea', ['label' => 'Deskripsi', 'field' => 'description'])

                            @include('forms.date', ['label' => 'Tanggal', 'field' => 'date'])

                            @include('forms.file', ['label' => 'Foto', 'field' => 'photo'])

                            <div class="mt-4">
                                @if($item)
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                @endif
                                <a href="{{route('dashboard')}}" type="submit" class="btn btn-label-primary ms-2"><i data-feather="back" class="avatar-icon"></i> Kembali</a>
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

        $('.date').flatpickr({
            enableTime: false,
            dateFormat: 'Y-m-d',
            noCalendar: false
        });
    </script>
@endsection
