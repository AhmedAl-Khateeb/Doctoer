<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class suppliesRequest extends FormRequest
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
            'supplies' => 'required|string',
            'state' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'PLZcode' => 'required|numeric',
            'yourWhatsApp' => 'required|string|max:20',

        ];
    }
}
