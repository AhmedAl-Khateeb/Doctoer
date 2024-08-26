<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class doctoersRequest extends FormRequest
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

                'name' => 'required|string|max:255',
                'specialization' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'price' => 'required|integer|min:0',
                'appointments' => 'required|string|max:255',
                'languages' => 'required|string|max:255',
                'aboutdoctor' => 'nullable|string',

        ];
    }
}
