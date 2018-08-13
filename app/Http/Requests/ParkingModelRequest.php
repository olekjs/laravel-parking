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
            'levels'         => 'required',
            'space_one'      => 'max:4000',
            'space_two'      => 'max:4000',
            'space_third'    => 'max:4000',
            'space_four'     => 'max:4000',
            'space_five'     => 'max:4000',
            'space_six'      => 'max:4000',
            'city'           => 'required|string',
            'address_number' => 'required|max:10000',
            'phone'          => 'required|max:15',
            'email'          => 'required|email',
        ];
    }
}
