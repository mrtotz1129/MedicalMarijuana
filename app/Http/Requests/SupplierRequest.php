<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class SupplierRequest extends Request
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
            'strSupplierName'       =>  'unique:tblSupplier|required',
            'strSupplierAddress'    =>  'required',
            'strSupplierContactNo'  =>  'regex:/^\d{10}/',
            'image'                 =>  'image'
        ];
    }

    public function messages()
    {
        return [
            'strSupplierName.unique'        =>  'Supplier name already exists.',
            'strSupplierName.required'      =>  'Supplier name is required.',
            'strSupplierContactNo.regex'    =>  'Invalid contact number format.',
            'image.image'                   =>  'The image you uploaded is not an image.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
