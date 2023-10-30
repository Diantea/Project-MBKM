@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ubah Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ $item ? route('user.update', $item) : route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($item)
                                @method('PUT')
                            @endif

                            <div class="row">

                                <div class="col-12">
                                    @include('forms.file', ['label' => 'Foto Profile', 'field' => 'photo'])
                                </div>

                                <div class="col-12">
                                    @include('forms.textfield', ['label' => 'Nama', 'field' => 'name', 'type' => 'text'])
                                </div>

                                @if(in_array($item->role, ['student']))
                                    <div class="col-12">
                                        @include('forms.textfield', ['label' => 'NPM/NIM', 'field' => 'npm', 'type' => 'text'])
                                    </div>
                                @endif

                                @if(in_array($item->role, ['student', 'lecturer']))
                                    <div class="col-12">
                                        @include('forms.selectbox', ['label' => 'MBKM', 'is_disabled' => true, 'field' => 'category_id', 'choices' => \App\Models\Category::orderBy('name', 'asc')->get()->map(function($category){ return ['label' => $category->name, 'value' => $category->id]; })])
                                    </div>
                                @endif

                                @if(in_array($item->role, ['student']))
                                    <div class="col-12">
                                        @include('forms.textfield', ['label' => 'Semester', 'field' => 'semester', 'type' => 'number'])
                                    </div>
                                @endif

                                <div class="col-12">
                                    @include('forms.textfield', ['label' => 'Email', 'field' => 'email', 'type' => 'email'])
                                </div>

                                <div class="col-12">
                                    @include('forms.textfield', ['label' => 'No Telepon', 'field' => 'phone', 'type' => 'text'])
                                </div>

                                <div class="col-12">
                                    @include('forms.selectbox', ['label' => 'Jenis Kelamin', 'field' => 'gender', 'choices' => [['label' => 'Laki - Laki', 'value' => 'Male'], ['label' => 'Perempuan', 'value' => 'Female']]])
                                </div>

                                <div class="col-12">
                                    @include('forms.textarea', ['label' => 'Alamat', 'field' => 'address'])
                                </div>

                                @if(!$item)
                                    <hr>

                                    <div class="col-12">
                                        @include('forms.textfield', ['label' => 'Kata Sandi', 'field' => 'password', 'type' => 'password'])
                                    </div>

                                    <div class="col-12">
                                        @include('forms.textfield', ['label' => 'Ulangi Kata Sandi', 'field' => 'password_confirmation', 'type' => 'password'])
                                    </div>
                                @endif
                            </div>

                            <div class="mt-4">
                                @if($item)
                                    <button type="submit" class="btn btn-primary">Perbarui</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                @endif
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                @include('layouts.reset-password', ['item' => $item, 'back_button' => false])
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
