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
            'strRoomTypeDesc'   =>  'required|unique:tblRoom',
            'roomTypeCreate'    =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'strRoomTypeDesc.required'      =>  'Room name is required.',
            'strRoomTypeDesc.unique'        =>  'Room name already exists.',
            'roomTypeCreate.required'       =>  'Room type is required.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
