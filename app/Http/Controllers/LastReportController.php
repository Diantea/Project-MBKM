<?php

namespace App\Http\Controllers;

use App\Http\Requests\LastReportRequest;
use App\Models\LastReport;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LastReportController extends Controller
{
    //
    function __construct(LastReport $lastReport) {
        $this->lastReport = $lastReport;
    }

    public function index() {
        $students = [];
        $reports = [];

        if (in_array(auth()->user()->role, ['admin', 'head'])) {
            $students = User::where('role', 'student')->orderBy('name', 'asc')->get();
        } else if (auth()->user()->role === 'student') {
            $reports = auth()->user()->last_reports()->orderBy('date', 'desc')->get();
        } else {
            $students = auth()->user()->students()->orderBy('name', 'asc')->get();
        }

        return view('report.last.index', compact('students', 'reports'));
    }

    public function create() {
        $item = null;
        return view('report.last.form', compact('item'));
    }

    public function store(LastReportRequest $request) {

        $report = auth()->user()->last_reports()->create([
            'date' => Carbon::now(),
        ]);

        $path = 'last-reports/';
        foreach (range(1, 4) as $i) {
            $file = 'file_' . $i;
            if ($request->file($file)) {
                $filename = 'photo_' . uniqid() . '.' . $request->file($file)->getClientOriginalExtension();
                $fileType = $request->file($file)->getClientOriginalExtension();
                $filePath = $path . $filename;
                $request->file($file)->storeAs('public/last-reports', $filename);
            }

            $report->files()->create([
                'name' => $report->file_names[$i - 1],
                'file' => $filePath,
                'type' => $fileType,
            ]);
        }

        return redirect()->back()->with('msg', 'Laporan akhir berhasil dibuat');
    }

    public function edit($id) {
        $item = $this->lastReport->find($id);
        foreach (range(1, 4) as $i) {
            $item->{'file_' . $i . '_url'} = $item->files()->where('name', $item->file_names[$i - 1])->first()->file_url;
            $item->{'file_' . $i . '_type'} = $item->files()->where('name', $item->file_names[$i - 1])->first()->type;
            $item->{'file_' . $i . '_name'} = $item->files()->where('name', $item->file_names[$i - 1])->first()->name;
        }
        return view('report.last.form', compact('item'));
    }

    public function update(LastReportRequest $request, $id) {
        $report = $this->lastReport->find($id);
        $path = 'last-reports/';

        foreach($request->except(['_token', '_method']) as $file => $value) {
            if($value) {
                $reportFile = $report->files()->where('name', $report->file_names[((int) explode('_', $file)[1]) - 1])->first();

                if ($request->file($file)) {
                    $filename = 'photo_' . uniqid() . '.' . $request->file($file)->getClientOriginalExtension();
                    $fileType = $request->file($file)->getClientOriginalExtension();
                    $filePath = $path . $filename;
                    $request->file($file)->storeAs('public/last-reports', $filename);
                    $reportFile->update([
                        'file' => $filePath,
                        'type' => $fileType,
                    ]);
                }
            }
        }

        return redirect()->back()->with('msg', 'Laporan harian berhasil diupdate');
    }

    public function index_student($student_id) {
        $student = User::where('role', 'student')->where('id', $student_id)->first();
        $reports = $student->last_reports()->orderBy('date', 'desc')->get();

        return view('report.last.index_student', compact('student', 'reports'));
    }

    public function show_student($student_id, $report_id) {
        $student = User::where('role', 'student')->where('id', $student_id)->first();
        $report = $student->last_reports()->find($report_id);

        return view('report.last.show_student', compact('student', 'report'));
    }
}
