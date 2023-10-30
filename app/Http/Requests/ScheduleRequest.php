<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'lecturer_id' => 'required|numeric|exists:users,id',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'room' => 'required',
        ];
    }
}
