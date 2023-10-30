<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title">Laporan Akhir</h5>
        @if(auth()->user()->role === 'student')
            <div>
                <a href="{{ route('last-report.create') }}" class="btn btn-primary">
                    <i class="ti ti-file-text me-2"></i> Buat Laporan
                </a>
            </div>
        @endif
    </div>
    <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table">
            <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($reports as $i => $report)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td class="text-center">{{ $report->date_display }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('last-report.show_student', [isset($student) ? $student : auth()->user(), $report]) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2">
                            <i class="ti ti-eye"></i>
                        </a>
                        @if(auth()->user()->role === 'student')
                            <a href="{{ route('last-report.edit', $report) }}" class="btn btn-outline-secondary btn-icon rounded-pill me-2">
                                <i class="ti ti-edit"></i>
                            </a>
                            <a href="" class="btn btn-outline-secondary btn-post btn-icon rounded-pill" data-target="#form-delete-{{$report->id}}">
                                <i class="ti ti-trash"></i>
                            </a>
                            <form action="{{ route('last-report.destroy', $report) }}" method="POST" id="form-delete-{{$report->id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
