<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'photo' => 'file|mimes:png,jpg,jpeg,svg,gif'
        ];
    }
}
