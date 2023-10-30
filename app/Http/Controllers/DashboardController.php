<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $informations = Information::orderBy('date', 'desc')->get();

        return view('dashboard', compact('informations'));
    }
    public function pending() {
        return view('pending');
    }
    public function change_semester(Request $request)
    {
        $user = User::find($request->user_id);
        auth()->login($user);
        return redirect()->back();
    }
}
