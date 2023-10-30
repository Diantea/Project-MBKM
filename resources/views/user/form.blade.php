@extends('layouts.master')

@section('title')
    Tambah Pengguna
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title d-flex align-items-center justify-content-between">
                            {{ $item ? 'Edit' : 'Tambah' }} Pengguna
                        </h4>

                        @include('layouts.alert')

                        @php
                            $users = [
                                ['label' => 'Mahasiswa', 'field' => 'student'],
                                ['label' => 'Dosen Pembimbing', 'field' => 'lecturer'],
                                ['label' => 'Kaprodi', 'field' => 'head'],
                                ['label' => 'Administrator', 'field' => 'admin'],
                            ];
                        @endphp

                        <div class="nav-align-top my-4">
                            <ul class="nav nav-tabs mb-3" role="tablist">

                                @foreach($users as $i => $user)
                                <li class="nav-item">
                                    <button
                                        type="button"
                                        class="nav-link {{ (request()->get('role') ? (request()->get('role') === $user['field']) : ($i === 0)) ? 'active' : (request('role') ? 'disabled' : '') }}"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#navs-{{ $i }}"
                                        aria-controls="navs-{{ $i }}"
                                        aria-selected="true"
                                    >
                                        {{ $user['label'] }}
                                    </button>
                                </li>
                                @endforeach

                            </ul>
                            <div class="tab-content">

                                @foreach($users as $i => $user)
                                    <div class="tab-pane fade show {{ (request()->get('role') ? (request()->get('role') === $user['field']) : ($i === 0)) ? 'active' : '' }}" id="navs-{{ $i }}" role="tabpanel">

                                        <form action="{{ $item ? route('user.update', $item) : route('user.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @if($item)
                                                @method('PUT')
                                                <div class="form-group mb-2">
                                                    <label class="form-label" for="id">Pengguna ID</label>
                                                    <input type="text" class="form-control" id="id" value="#{{ $item->id }}" disabled />
                                                </div>
                                            @endif

                                            <div class="row">

                                                <input type="hidden" name="role" value="{{ $user['field'] }}">

                                                <div class="col-6">
                                                    @include('forms.textfield', ['label' => 'Nama', 'field' => 'name', 'type' => 'text'])
                                                </div>

                                                @if(in_array($user['field'], ['student']))
                                                <div class="col-6">
                                                    @include('forms.textfield', ['label' => 'NPM/NIM', 'field' => 'npm', 'type' => 'text'])
                                                </div>
                                                @endif

                                                @if(in_array($user['field'], ['student', 'lecturer']))
                                                <div class="col-6">
                                                    @include('forms.selectbox', ['label' => 'MBKM', 'field' => 'category_id', 'choices' => \App\Models\Category::orderBy('name', 'asc')->get()->map(function($category){ return ['label' => $category->name, 'value' => $category->id]; })])
                                                </div>
                                                @endif

                                                @if(in_array($user['field'], ['student']))
                                                <div class="col-6">
                                                    @include('forms.textfield', ['label' => 'Semester', 'field' => 'semester', 'type' => 'number'])
                                                </div>
                                                @endif

                                                <div class="col-6">
                                                    @include('forms.textfield', ['label' => 'Email', 'field' => 'email', 'type' => 'email'])
                                                </div>

                                                <div class="col-6">
                                                    @include('forms.textfield', ['label' => 'No Telepon', 'field' => 'phone', 'type' => 'text'])
                                                </div>

                                                <div class="col-6">
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
                                                <a href="{{route('user.index')}}" type="submit" class="btn btn-label-primary ms-2"><i data-feather="back" class="avatar-icon"></i> Kembali</a>
                                            </div>

                                        </form>

                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
