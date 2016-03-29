<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class EquipmentRequest extends Request
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
            'strEquipmentCode'  => 'required|unique:tblEquipment',
            'image'             => 'image',
            'equipmentType'     => 'required',
            'room'              => 'required',
            'supplier'          => 'required'
        ];
    }

     public function messages()
    {
        return [
            'strEquipmentCode.required'     =>  'Equipment code is required.',
            'strEquipmentCode.unique'       =>  'Equipment code already exists.',
            'image.image'                   =>  'Image uploaded should be an image format.',
            'room.required'                =>  'Floor is required.',
            'supplier.required'             =>  'Supplier is required'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
