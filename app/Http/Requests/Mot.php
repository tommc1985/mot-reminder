<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Mot extends Request
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
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'email',
            'handicap' => 'required',
            'car_make' => '',
            'reg_no' => '',
            'comments' => '',
            'mot_date' => 'required',
        ];
    }
}
