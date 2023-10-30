@extends('layouts.master')

@section('title')
    Tambah Tempat Magang
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title d-flex align-items-center justify-content-between">
                            {{ $item ? 'Edit' : 'Tambah' }} Tempat Magang
                        </h4>

                        @include('layouts.alert')
                        <form action="{{ $item ? route('company.update', $item) : route('company.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($item)
                                @method('PUT')

                                <div class="form-group mb-2">
                                    <label class="form-label" for="id">Tempat Magang ID</label>
                                    <input type="text" class="form-control" id="id" value="#{{ $item->id }}" disabled />
                                </div>

                            @endif

                            @include('forms.textfield', ['label' => 'Nama Tempat', 'field' => 'name', 'type' => 'text'])

                            @include('forms.textarea', ['label' => 'Alamat', 'field' => 'address'])

                            @include('forms.textfield', ['label' => 'Maksimal', 'field' => 'max', 'type' => 'number'])

                            @include('forms.file', ['label' => 'Surat Pengantar', 'field' => 'file_1'])

                            @include('forms.file', ['label' => 'Kontrak Kerja', 'field' => 'file_2'])

                            <div class="mt-4">
                                @if($item)
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                @endif
                                <a href="{{route('company.index')}}" type="submit" class="btn btn-label-primary ms-2"><i data-feather="back" class="avatar-icon"></i> Kembali</a>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>



    </div>
@endsection
