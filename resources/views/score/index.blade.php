@extends('layouts.master')

@section('title')
    Penilaian
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">
                    Penilaian
                </h5>
            </div>
            @if(auth()->user()->role === 'student')
            <div class="card-body">

                @if(auth()->user()->total_score)
               <div class="row">
                   <div class="col-md-5">
                       <table class="table table-striped">
                           <tbody>
                           @foreach(auth()->user()->category->courses()->where('semester', auth()->user()->semester)->get() as $course)
                               <tr>
                                   <th>{{ $course->name }}</th>
                                   <td style="width: 10px">:</td>
                                   <td style="width: 80px" class="text-end">
                                       {{ auth()->user()->scores()->where('course_id', $course->id)->first()->score ?? null }}
                                   </td>
                               </tr>
                           @endforeach
                           <tr>
                               <th><b>Jumlah</b></th>
                               <td style="width: 10px"><b>:</b></td>
                               <td style="width: 80px" class="text-end">
                                   <b>{{auth()->user()->total_score}}</b>
                               </td>
                           </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
                @else
                    Belum ada penilaian
                @endif

            </div>
            @else
            <div class="card-datatable table-responsive pt-0">
               <table class="datatables-basic table">
                   <thead>
                   <tr>
                       <th class="text-center">No</th>
                       <th>NPM</th>
                       <th>Nama</th>
                       <th>Email</th>
                       <th class="text-center">Semester</th>
                       <th class="text-center">Aksi</th>
                   </tr>
                   </thead>
                   <tbody>
                        @php
                        $users = \App\Models\User::where('role', 'student')->get();
                        if(auth()->user()->role === 'lecturer') {
                            $users = auth()->user()->students;
                        }
                        @endphp
                       @foreach($users as $i => $user)
                       <tr>
                           <td class="text-center">{{ $i + 1 }}</td>
                           <td>{{ $user->npm }}</td>
                           <td>{{ $user->name }}</td>
                           <td>{{ $user->email }}</td>
                           <td class="text-center text-capitalize">{{ $user->semester }}</td>
                           <td class="d-flex justify-content-center">
                               <a href="{{ route('score.edit', ['user' => $user]) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                   <i class="ti ti-edit"></i>
                               </a>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
            @endif
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
