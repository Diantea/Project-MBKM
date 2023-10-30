<?php

namespace App\Http\Controllers;

use App\Http\Requests\DailyReportRequest;
use App\Models\DailyReport;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function __construct(DailyReport $dailyReport) {
        $this->dailyReport = $dailyReport;
    }

    public function index() {
        $students = [];
        $reports = [];

        if (in_array(auth()->user()->role, ['admin', 'head'])) {
            $students = User::where('role', 'student')->orderBy('name', 'asc')->get();
        } else if (auth()->user()->role === 'student') {
            $reports = auth()->user()->daily_reports()->orderBy('date', 'desc')->get();
        } else {
            $students = auth()->user()->students()->orderBy('name', 'asc')->get();
        }

        return view('report.index', compact('students', 'reports'));
    }

    public function create() {
        $item = null;
        return view('report.form', compact('item'));
    }

    public function store(DailyReportRequest $request) {

        $path = 'reports/';
        $photo = null;
        if ($request->file('photo')) {
            $filename = 'photo_' . uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();
            $photo = $path . $filename;
            $request->file('photo')->storeAs('public/reports', $filename);
        }

        auth()->user()->daily_reports()->create([
            'date' => $request->date,
            'start' => $request->start,
            'end' => $request->end,
            'description' => $request->description,
            'photo' => $photo,
        ]);

        return redirect()->back()->with('msg', 'Laporan harian berhasil dibuat');
    }

    public function edit($id) {
        $item = $this->dailyReport->find($id);
        return view('report.form', compact('item'));
    }

    public function update(DailyReportRequest $request, $id) {
        $report = $this->dailyReport->find($id);

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value) {
                $params[$key] = $value;
            }
        }
        $report->update($params);

        return redirect()->back()->with('msg', 'Laporan harian berhasil diupdate');
    }

    public function destroy(DailyReport $report) {
        $report->delete();
        return redirect()->back()->with('msg', 'Laporah harian berhasil dihapus');
    }

    public function index_student($student_id) {
        $student = User::where('role', 'student')->where('id', $student_id)->first();
        $reports = $student->daily_reports()->orderBy('start', 'desc')->get();

        return view('report.index_student', compact('student', 'reports'));
    }

    public function show_student($student_id, $report_id) {
        $student = User::where('role', 'student')->where('id', $student_id)->first();
        $report = $student->daily_reports()->find($report_id);

        return view('report.show_student', compact('student', 'report'));
    }

    public function print($student_id) {
        $student = User::where('role', 'student')->where('id', $student_id)->first();
        $reports = $student->daily_reports;

        return view('report.print', compact('reports', 'student'));
    }
}
