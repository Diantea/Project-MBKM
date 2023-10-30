<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    function __construct(Schedule $schedule) {
        $this->schedule = $schedule;
    }

    public function index() {
        if (auth()->user()->role === 'admin') {
            $schedules = $this->schedule->orderBy('date', 'desc')->orderBy('start', 'desc')->get();
        } else if (auth()->user()->role === 'student' && auth()->user()->lecturer) {
            $schedules = $this->schedule->where('lecturer_id', auth()->user()->lecturer->lecturer_id)->orderBy('date', 'desc')->orderBy('start', 'desc')->get();
        } else {
            $schedules = $this->schedule->where('lecturer_id', auth()->user()->id)->orderBy('date', 'desc')->orderBy('start', 'desc')->get();
        }

        return view('schedule.index', compact('schedules'));
    }

    public function create() {
        $item = null;
        return view('schedule.form', compact('item'));
    }

    public function store(ScheduleRequest $request) {
        $this->schedule->create( $request->only(['lecturer_id', 'room', 'date', 'start', 'end']) );
        return redirect()->back()->with('msg', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id) {
        $item = $this->schedule->find($id);
        return view('schedule.form', compact('item'));
    }

    public function update(ScheduleRequest $request, $id) {
        $schedule = $this->schedule->find($id);

        $params = [];
        foreach($request->all() as $key => $value) {
            if($value) {
                $params[$key] = $value;
            }
        }
        $schedule->update($params);

        return redirect()->back()->with('msg', 'Jadwal berhasil diupdate');
    }

    public function destroy($id) {
        $schedule = $this->schedule->find($id);

        $schedule->delete();

        return redirect()->back()->with('msg', 'Jadwal berhasil dihapus');
    }
}
