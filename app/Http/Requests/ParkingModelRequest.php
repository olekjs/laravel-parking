<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkingModelRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'city'           => 'required|string|min:3|max:100',
            'address_number' => 'required|min:1|max:1000',
            'phone'          => 'required|numeric',
            'email'          => 'required|email',
            'level_val'      => 'required|numeric',
        ];
    }

    public function messages() 
    {
        return [
            //
        ];
    }
}
