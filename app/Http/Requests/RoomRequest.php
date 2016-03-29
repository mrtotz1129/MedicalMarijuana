<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class RoomRequest extends Request
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
            'roomTypeCreate'    =>  'required',
            'dblPrice'          =>  'required|numeric',
            'intNumBed'         =>  'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'roomTypeCreate.required'       =>  'Room type is required.',
            'dblPrice.required'             =>  'Room price is required.',
            'dblPrice.numeric'              =>  'Room price should be numeric.',
            'intNumBed.required'             =>  'Room price is required.',
            'intNumBed.numeric'              =>  'Room price should be numeric.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
