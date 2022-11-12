<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'school'=> 'required|string',
            'department'=> 'required|string',
            'description' => 'required|string',

            'start' => 'required|date',
            'end' => 'required|date',
            'apply_end' => 'required|date',
            'apply_notice' => 'required|string',
            'url' => 'required|active_url',
            'tags' => 'required|array',
            'offers' => 'required|array',

            'offers.*.name' => 'required|string',
            'offers.*.description' => 'required|string',
            'offers.*.price' => 'required|integer',
            'offers.*.priceValidUntil' => 'required|date',

            'comment' => 'nullable|string',
        ];
    }
}
