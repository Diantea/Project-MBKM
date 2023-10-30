@extends('layouts.master')

@section('title')
    Reset Kata Sandi
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-lg-8 col-md-8">
                @include('layouts.reset-password', ['item' => $item])
            </div>
        </div>

    </div>
@endsection
