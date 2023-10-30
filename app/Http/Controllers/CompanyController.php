<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    function __construct(User $user, Company $company) {
        $this->user = $user;
        $this->company = $company;
    }

    public function index() {
        $item = null;
        $companies_active = $this->company->orderBy('name', 'asc')->where('status', 'active')->get();
        $companies_inactive = $this->company->orderBy('name', 'asc')->where('status', 'inactive')->get();

        return view('company.index', compact('companies_active', 'companies_inactive', 'item'));
    }

    public function show(Company $company) {

        return view('company.show', compact('company'));
    }

    public function index_submission() {
        $item = null;
        $companies_active = $this->company->orderBy('name', 'asc')->where('status', 'active')->get();
        $companies_inactive = $this->company->orderBy('name', 'asc')->where('status', 'inactive')->get();

        return view('company.index_submission', compact('companies_active', 'companies_inactive', 'item'));
    }

    public function create() {
        $item = null;
        return view('company.form', compact('item'));
    }

    public function store(CompanyRequest $request) {

        $path = 'company-documents/';

        $file = 'file_1';
        $filePath1 = $this->extracted($request, $file, $path);

        $file = 'file_2';
        $filePath2 = $this->extracted($request, $file, $path);

        $this->company->create([
            'name' => $request->name,
            'address' => $request->address,
            'max' => $request->max,
            'status' => 'active',
            'file_1' => $filePath1,
            'file_2' => $filePath2,

        ]);

        return redirect()->back()->with('msg', 'Tempat magang berhasil dibuat');
    }

    public function edit($id) {
        $item = $this->company->find($id);
        return view('company.form', compact('item'));
    }

    public function update(CompanyRequest $request, $id) {
        $company = $this->company->find($id);
        $path = 'company-documents/';

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value) {
                $params[$key] = $value;
             }

            if ($key === 'file_1' || $key === 'file_2') {
                $params[$key] = $this->extracted($request, $key, $path);
            }
        }
        $company->update($params);

        return redirect()->back()->with('msg', 'Tempat magang berhasil diupdate');
    }

    public function destroy(Company $company) {
        $company->delete();
        return redirect()->back()->with('msg', 'Tempate magang berhasil dihapus');
    }

    public function request_company(Request $request) {
        $company = $this->company->create([
            'name' => $request->name,
            'address' => $request->address,
            'status' => 'inactive',
        ]);

        $company->internships()->create([
            'student_id' => auth()->user()->id,
            'status' => 'pending',
            'type' => 'register',
        ]);

        return redirect()->route('company.index_submission')->with('msg', 'Tempat magang berhsil diajukan');
    }

    public function register_company(Request $request) {

        $company = $this->company->find($request->company_id);

        $company->internships()->create([
            'student_id' => auth()->user()->id,
            'status' => 'pending',
            'type' => 'apply',
        ]);

        return redirect()->route('company.index_submission')->with('msg', 'Berhasil daftar');
    }

    /**
     * @param Request $request
     * @param string $file
     * @param string $path
     * @return string[]
     */
    public function extracted(Request $request, string $file, string $path): string
    {
        $filePath = '';
        if ($request->file($file)) {
            $filename = 'file_' . uniqid() . '.' . $request->file($file)->getClientOriginalExtension();
            $filePath = $path . $filename;
            $request->file($file)->storeAs('public/company-documents', $filename);
        }
        return $filePath;
    }
}
