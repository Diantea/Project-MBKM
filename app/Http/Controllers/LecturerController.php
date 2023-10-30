<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    function __construct(User $user, Company $company) {
        $this->user = $user;
        $this->company = $company;
        $this->middleware('admin');
    }

    public function index() {
        $lecturers = $this->user->orderBy('name', 'asc')->where('role', 'lecturer')->get();

        return view('lecturer.index', compact('lecturers'));
    }

    public function show($lecturer_id) {
        $lecturer = $this->user->find($lecturer_id);

        return view('lecturer.show', compact('lecturer'));
    }

    public function update(Request $request, $lecturer_id) {
        $lecturer = $this->user->find($lecturer_id);

        $msg = 'Dosen Pembimbing berhasil diperbarui';
        $params = [];
        foreach ($request->all() as $key => $value) {
            if ($value) {
                $params[$key] = $value;
            }
        }

        $lecturer->update($params);

        return redirect()->back()->with('msg', $msg);
    }

    public function add_student(Request $request, $lecturer_id) {
        $lecturer = $this->user->find($lecturer_id);

        $lecturer->students()->attach($request->student_id);

        return redirect()->back()->with('msg', 'Mahasiswa berhasil ditambahkan');
    }
}
