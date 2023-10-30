<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LastReportRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'file_1' => 'required|file',
            'file_2' => 'required|file',
            'file_3' => 'required|file',
            'file_4' => 'required|file',
        ];

        if ($this->isMethod('PUT')) {
            $rules = [
                'file_1' => 'file',
                'file_2' => 'file',
                'file_3' => 'file',
                'file_4' => 'file',
            ];
        }

        return $rules;
    }
}
