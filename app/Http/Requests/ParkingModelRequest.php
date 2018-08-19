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
            'city'           => 'required|string',
            'address_number' => 'required|max:10000',
            'phone'          => 'required|max:15',
            'email'          => 'required|email',
            'level_val'      => 'required',
        ];
    }
}
