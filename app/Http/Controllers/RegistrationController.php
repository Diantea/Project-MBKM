<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function __construct(User $user) {
        $this->user = $user;
        $this->middleware('admin');
    }

    public function index() {
        $students_active = $this->user->where('role', 'student')->where('status', 'active')->orderBy('created_at', 'asc')->get();
        $students_inactive = $this->user->where('role', 'student')->where('status', 'inactive')->orderBy('updated_at', 'desc')->get();

        return view('registration.index', compact('students_active', 'students_inactive'));
    }

    public function update(Request $request, $student_id) {
        $student = $this->user->find($student_id);

        $msg = '';
        $params = [];
        foreach ($request->all() as $key => $value) {
            if ($value) {
                $params[$key] = $value;
            }

            if ($key === "status" && $value === "active") {
                $msg = 'Mahasiswa berhasil diaktifkan';
            } else if($key === "status" && $value === "inactive") {
                $msg = 'Mahasiswa berhsail dinonaktifkan';
            }
        }

        $student->update($params);

        return redirect()->back()->with('msg', $msg);
    }

    public function destroy($student_id) {
        $student = $this->user->find($student_id);
        $student->delete();
        return redirect()->back()->with('msg', 'Mahasiswa berhasil dihapus');
    }
}
