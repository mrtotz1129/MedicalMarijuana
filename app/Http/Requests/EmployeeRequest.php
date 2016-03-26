<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class EmployeeRequest extends Request
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
            'strFirstName'      =>  'unique_with:tblEmployee,strMiddleName,strLastName',
            'strEmpEmail'       =>  'unique:tblEmployee,strEmail',
            'fileUpload'        =>  'image',
            'strEmpContactNo'   =>  'regex:/^\d{10}/'
        ];
    }

    public function messages()
    {
        return [
            'strFirstName.unique_with'  =>  'Name already exists.',
            'fileUpload.image'          =>  'The file you uploaded is not an image.',
            'strEmpContactNo.regex'     =>  'Invalid contact number format.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
