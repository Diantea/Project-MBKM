<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Internship;
use App\Models\User;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    function __construct(User $user, Company $company, Internship $internship) {
        $this->user = $user;
        $this->company = $company;
        $this->internship = $internship;
    }
    //
    public function update(Request $request, $id) {
        $internship = $this->internship->find($id);

        $rules = [];
        if ($request->status === 'processed') {
            $rules['mou'] = 'required|file';
        } else if ($request->status === 'signed') {
            $rules['signed_mou'] = 'required|file';
        }
        $validation = \Validator::make($request->all(), $rules);
        if ($validation->fails()) return redirect()->back()->withErrors($validation->errors());

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value) {
                $params[$key] = $value;
            }

            if ($key === 'status') {
                if ($value === 'accepted') {
                    $internship->company->update(['status' => 'active']);
                }
            } else if ($key === 'mou' || $key === 'signed_mou') {
                $path = 'internship-documents/';
                $params[$key] = null;
                if ($request->file($key)) {
                    $filename = 'file_' . uniqid() . '.' . $request->file($key)->getClientOriginalExtension();
                    $params[$key] = $path . $filename;
                    $request->file($key)->storeAs('public/' . $path, $filename);
                }
            }
        }
        $internship->update($params);

        return redirect()->back()->with('msg', 'Pengajuan magang berhasil diperbarui');
    }

    public function destroy($id) {
        $internship = $this->internship->find($id);
        $internship->delete();

        return redirect()->back()->with('msg', 'Pengajuan magang berhasil dibatalkan');
    }
}
