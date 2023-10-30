<table>
    <tr>
        <td style="vertical-align: middle">
            <img src="{{ asset('assets/img/unsub.jpg') }}" alt="unsub" width="120" style="margin-right: 2.5rem;">
        </td>
        <td align="center" style="vertical-align: middle">
            <p>UNIVERSITAS SUBANG</p>
            <p><b>FAKULTAS ILMU KOMPUTER</b></p>
            <p>Akreditasi: B SK BAN PT No: 6453/SL/BAN-PT/Akred/S/X/2020</p>
            <p>Jl. R. A. Kartini Km 3 Telp. (0260) 411415 Subang</p>
            <p>E-Mail : fasilkom@unsub.ac.id</p>
        </td>
    </tr>
</table>

<hr style="border-width: 2px; border-color: #252525; background: #252525; margin-bottom: 0; margin-top: 1rem">
<hr style="border-color: #252525; margin-top: 0.2rem">

<p style="font-size: 11px; margin: 2rem 0 1rem 0" align="center">
    LOGBOOK AKTIVITAS HARIAN MBKM
</p>

<table class="identify">
    <tr>
        <td>NAMA</td>
        <td style="padding: 0 0.5rem">:</td>
        <td>{{ $student->name }}</td>
    </tr>
    <tr>
        <td>NPM</td>
        <td style="padding: 0 0.5rem">:</td>
        <td>{{ $student->npm }}</td>
    </tr>
</table>

<table style="width: 100%; border-collapse: collapse;" border="1">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam <br> Mulai</th>
        <th>Jam <br> Selesai</th>
        <th>Penjelasan Kegiatan</th>
        <th>Paraf <br> Mahasiswa</th>
        <th>Paraf <br> Pembimbing</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reports as $i => $report)
        <tr>
            <td align="center">{{ $i + 1 }}</td>
            <td align="center">{{ date('j F Y', strtotime($report->date)) }}</td>
            <td align="center">{{ $report->start_display }}</td>
            <td align="center">{{ $report->end_display }}</td>
            <td>{{ $report->description }}</td>
            <td></td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>

<style>
    * {
        font-size: 14px;
    }
    @media print {
        body {
            margin: 2em;
        }
        p {
            margin: 0.2rem;
        }
        td {
            padding: 0.5rem;
        }
        .identify {
            margin-bottom: 1rem;
        }
        .identify td {
            padding: 0.1rem 0;
        }
    }
</style>

<script>
    window.print()
    window.onafterprint = function(event) {
        window.location = '{{ url()->previous() }}'
    }
</script>
