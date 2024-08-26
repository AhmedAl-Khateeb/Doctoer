<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class reportsRequest extends FormRequest
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
            'name'=>'required|string|max:30|min:2',
            'gender'=>'required',
            'age'=>'integer',
            'weight'=>'integer',
            'height'=>'integer',
            'address'=>'required|string',
            // 'job'=>'required|string|max:25',
            'phone'=>'required|string|max:20|min:11',
            'email'=>'required|string',
        ];
    }
}
