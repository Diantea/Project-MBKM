<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct(User $user) {
        $this->user = $user;

        $this->middleware('admin')->except(['update', 'profile']);
    }

    public function index() {
        $data = [];

        $data['all'] = $this->user->orderBy('role', 'asc')->orderBy('name', 'asc')->get();
        $data['heads'] = $this->user->where('role', 'head')->orderBy('name', 'asc')->get();
        $data['admins'] = $this->user->where('role', 'admin')->orderBy('name', 'asc')->get();
        $data['lecturers'] = $this->user->where('role', 'lecturer')->orderBy('name', 'asc')->get();
        $data['students'] = $this->user->where('role', 'student')->orderBy('name', 'asc')->get();

        return view('user.index', compact('data'));
    }

    public function create() {
        $item = null;
        return view('user.form', compact('item'));
    }

    public function show($id) {
        $user = $this->user->find($id);
        return view('user.show', compact('user'));
    }

    public function store(Request $request) {

        $previous = app('url')->previous();

        $validation = \Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|unique:users,email|email',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        if ($validation->fails()) return redirect()->to($previous . '?' . http_build_query(['role' => $request->role]))->withInput($request->all())->withErrors($validation->errors());

        $params = $request->only(['role', 'name', 'npm', 'category_id', 'semester', 'email', 'phone', 'gender', 'address']);
        $params = collect($params)->merge(['status' => 'active', 'password' => bcrypt($request->password)])->all();
        $user = $this->user->create($params);
        return redirect()->to($previous . '?' . http_build_query(['role' => $user->role]))->with('msg', 'Pengguna berhasil dibuat');
    }

    public function edit($id) {
        $item = $this->user->find($id);
        return view('user.form', compact('item'));
    }

    public function update(Request $request, $id) {
        $user = $this->user->find($id);
        $previous = app('url')->previous();

        $validation = \Validator::make($request->all(), [
            'password' => 'confirmed',
            'email' => 'email|unique:users,email,' . $user->id,
        ]);
        if ($validation->fails()) return redirect()->to($previous . '?' . http_build_query(['role' => $request->role]))->withInput($request->all())->withErrors($validation->errors());

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value && $key !== 'password_confirmation') {
                if ($key === 'password') {
                    $params[$key] = bcrypt($value);
                } else if ($key === 'photo' && $request->file('photo')) {
                    $path = 'users/';
                    if ($request->file('photo')) {
                        $filename = 'photo_' . uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();
                        $photo = $path . $filename;
                        $request->file('photo')->storeAs('public/users', $filename);
                        $params[$key] = $photo;
                    }
                } else {
                    $params[$key] = $value;
                }
            }
        }
        $user->update($params);

        return redirect()->to($previous . '?' . http_build_query(['role' => $user->role]))->with('msg', 'Pengguna berhasil diupdate');
    }

    public function destroy(Request $request, $id) {
        $user = $this->user->find($id);

        $user->delete();

        return redirect()->back()->with('msg', 'Pengguna berhasil dihapus');
    }

    public function reset_password($id) {
        $item = $this->user->find($id);
        return view('user.reset-password', compact('item'));
    }

    public function profile() {
        $item = auth()->user();
        return view('profile', compact('item'));
    }
}
