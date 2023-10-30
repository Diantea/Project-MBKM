@extends('layouts.master')

@section('title')
    Pengajuan Tempat Magang
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        @if(auth()->user()->role === 'student')
            @include('layouts.submission_alert')

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Pengajuan Magang
                    </h5>
                </div>
                <div class="card-datatable table-responsive pt-0">
                    <table class="datatables-basic table">
                        <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Perusahaan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Dokumen MoU</th>
                            <th class="text-center">Signed MoU</th>
                            <th class="text-center">Surat Pengantar</th>
                            <th class="text-center">Kontrak Kerja</th>
                            <th class="text-center">Tanggal Pengajuan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->internships()->orderBy('created_at', 'desc')->get() as $i => $internship)
                            <tr>
                                <td class="text-center">{{ $i + 1 }}</td>
                                <td>{{ $internship->company->name }}</td>
                                <td class="text-center">{!! $internship->status_display !!}</td>
                                <td class="text-center">
                                    @if($internship->mou_url)
                                        <a href="{{ $internship->mou_url }}" download="{{ $internship->company->name . '_' . $internship->student->name }}" class="btn btn-label-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Dokumen MoU">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($internship->signed_mou_url)
                                        <a href="{{ $internship->signed_mou_url }}" download="{{ $internship->company->name . '_' . $internship->student->name }}" class="btn btn-label-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Dokumen MoU yang telah di tanda tangani">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($internship->company->file_1 && $internship->status === 'accepted')
                                        <a href="{{ $internship->company->file_1_url }}" download="Surat Pengantar_{{ $internship->company->name }}" class="btn btn-label-secondary btn-icon rounded-pill ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Surat Pengantar">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($internship->company->file_2 && $internship->status === 'accepted')
                                        <a href="{{ $internship->company->file_2_url }}" download="Kontrak Kerja_{{ $internship->company->name }}" class="btn btn-label-secondary btn-icon rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Kontrak Kerja">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">{{ $internship->created_at->format('d/m/Y H:i') }}</td>
                                <td class="d-flex justify-content-center">
                                    @if($internship->status === 'pending')
                                        <a href="" data-target="#form-cancel-{{ $internship->id }}" class="btn-post btn btn-outline-danger btn-icon rounded-pill" data-bs-toggle="tooltip" data-bs-placement="top" title="Batalkan">
                                            <i class="ti ti-x"></i>
                                        </a>
                                        <form action="{{ route('internship.destroy', $internship) }}" method="POST" id="form-cancel-{{ $internship->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @elseif($internship->status === 'processed')
                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Upload Dokumen">
                                            <a href="" data-bs-target="#internship-{{ $internship->id }}" data-bs-toggle="modal" class="btn btn-outline-success btn-icon rounded-pill me-2">
                                                <i class="ti ti-file-upload"></i>
                                            </a>
                                        </span>
                                    @endif

                                    @if($internship->status !== 'pending')
                                        <div data-bs-toggle="tooltip" data-bs-placement="top" title="Tidak bisa dibatalkan">
                                            <a href="" class="btn btn-outline-secondary btn-icon rounded-pill disabled">
                                                <i class="ti ti-x"></i>
                                            </a>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @else
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
                            <div class="badge rounded-pill bg-label-warning me-3 p-2">
                                <i class="ti ti-building-community ti-sm"></i>
                            </div>
                            <div class="card-info">
                                <h5 class="mb-0">{{ \App\Models\Internship::where('status', 'pending')->count() }}</h5>
                                <small>Pengajuan Magang</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @include('layouts.alert')

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Pengajuan Magang
                </h5>
            </div>
            <div class="card-datatable table-responsive pt-0">
                <table class="datatables-basic table">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tipe</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Dokumen MoU</th>
                        <th class="text-center">Signed MoU</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Internship::orderBy('created_at', 'desc')->get() as $i => $internship)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>{{ $internship->company->name }}</td>
                            <td>{{ $internship->student->name }}</td>
                            <td>{{ $internship->type === 'apply' ? 'Pendaftaran' : 'Pengajuan' }}</td>
                            <td class="text-center">{!! $internship->status_display !!}</td>
                            <td class="text-center">
                                @if($internship->mou_url)
                                <a href="{{ $internship->mou_url }}" download="{{ $internship->company->name . '_' . $internship->student->name }}" class="btn btn-label-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Dokumen MoU">
                                    <i class="ti ti-download"></i>
                                </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                @if($internship->signed_mou_url)
                                <a href="{{ $internship->signed_mou_url }}" download="{{ $internship->company->name . '_' . $internship->student->name }}" class="btn btn-label-secondary btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Dokumen MoU yang telah di tanda tangani">
                                    <i class="ti ti-download"></i>
                                </a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">{{ $internship->created_at->format('d/m/Y') }}</td>
                            <td class="d-flex justify-content-center">

                                @if($internship->status === 'pending')
                                    @if($internship->type === 'apply')
                                        <a href="" data-target="#form-accept-{{ $internship->id }}" class="btn-post btn btn-outline-success btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Terima">
                                            <i class="ti ti-checks"></i>
                                        </a>
                                        <form action="{{ route('internship.update', $internship) }}" method="POST" id="form-accept-{{ $internship->id }}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="accepted">
                                        </form>
                                    @else
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Proses">
                                        <a href="" data-bs-target="#internship-{{ $internship->id }}" data-bs-toggle="modal" class="btn btn-outline-success btn-icon rounded-pill me-2">
                                            <i class="ti ti-mail-forward"></i>
                                        </a>
                                    </span>
                                    @endif
                                @elseif($internship->status === 'signed')
                                    <a href="" data-target="#form-accept-{{ $internship->id }}" class="btn-post btn btn-outline-success btn-icon rounded-pill me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Terima">
                                        <i class="ti ti-checks"></i>
                                    </a>
                                    <form action="{{ route('internship.update', $internship) }}" method="POST" id="form-accept-{{ $internship->id }}">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="accepted">
                                    </form>
                                @endif

                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Batalkan">
                                    <a href="" data-target="#form-reject-{{ $internship->id }}" class="btn-post btn btn-outline-secondary btn-icon rounded-pill {{ in_array($internship->status, ['accepted', 'rejected']) ? 'disabled' : '' }}">
                                        <i class="ti ti-x"></i>
                                    </a>
                                </div>

                                <form action="{{ route('internship.update', $internship) }}" method="POST" id="form-reject-{{ $internship->id }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="rejected">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
        @endif

        @foreach(\App\Models\Internship::whereIn('status', ['pending', 'processed'])->orderBy('created_at', 'desc')->get() as $i => $internship)
            <div
                class="modal fade"
                id="internship-{{ $internship->id }}"
                aria-labelledby="modalToggleLabel"
                tabindex="-1"
                style="display: none"
                aria-hidden="true"
            >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('internship.update', $internship) }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalToggleLabel">Upload Dokumen MoU</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">

                                @csrf
                                @method('PUT')

                                @if($internship->status === 'pending')
                                <input type="hidden" name="status" value="processed">

                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="mb-1">Mahasiswa</h6>
                                        <p class="mb-1">{{ $internship->student->name }}</p>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="mb-1">Perusahaan</h6>
                                        <p class="mb-1">{{ $internship->company->name }}</p>
                                    </div>
                                </div>

                                <hr>

                                @include('forms.file', ['field' => 'mou', 'label' => 'Dokumen MoU'])

                                @else
                                <input type="hidden" name="status" value="signed">
                                @include('forms.file', ['field' => 'signed_mou', 'label' => 'Dokumen MoU'])
                                @endif

                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      @endforeach

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
