<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        return view('score.index');
    }
    public function edit($student_id)
    {
        $student = User::find($student_id);
        return view('score.edit', compact('student'));
    }
    public function update(Request $request, $student_id)
    { 
        $student = User::find($student_id);
        foreach($request->course_id as $course_id => $score) {
            $scr = $student->scores()->where('course_id', $course_id)->first();
            if($scr) {
                $scr->update([
                    'score' => $score
                ]);
            } else {
                $student->scores()->create([
                    'score' => $score,
                    'course_id' => $course_id, 
                ]);
            } 
        }

        return redirect()->back()->with('msg', 'Score updated successful');
    }
}
