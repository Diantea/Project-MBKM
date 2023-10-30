<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    function __construct(Information $information) {
        $this->information = $information;
    }

    public function create() {
        $item = null;
        return view('information.form', compact('item'));
    }
 
    public function store(InformationRequest $request) {

        $path = 'information/';
        $photo = null;
        if ($request->file('photo')) {
            $filename = 'photo_' . uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();
            $photo = $path . $filename;
            $request->file('photo')->storeAs('public/information', $filename);
        }

        $this->information->create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'photo' => $photo,
        ]);

        return redirect()->back()->with('msg', 'Informasi berhasil dibuat');
    }

    public function edit($id) {
        $item = $this->information->find($id);
        return view('information.form', compact('item'));
    }

    public function update(InformationRequest $request, $id) {
        $information = $this->information->find($id);

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value) {
                $params[$key] = $value;
            }
        }
        $information->update($params);

        return redirect()->back()->with('msg', 'Informasi berhasil diupdate');
    }

    public function destroy($id) {
        $information = $this->information->find($id);
        $information->delete();

        return redirect()->back()->with('msg', 'Informasi berhasil dihapus');
    }
}
