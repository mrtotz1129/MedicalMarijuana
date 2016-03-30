<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class AdmissionOpdRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'             =>  'image',
            'doctorSelect'      =>  'required',
            'strFirstName'      =>  'required|unique_with:tblEmployee,strMiddleName,strLastName',
            'strLastName'       =>  'required',
            'strBirthdate'      =>  'required',
            'strGender'         =>  'required',
            'strContactNumber'  =>  'regex:/^\d{10}/',
            'strEmail'          =>  'email',
            'strAddress'        =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'image.image'               =>  'Image you uploaded is not an image',
            'doctorSelect.required'     =>  'Doctor is required.',
            'strFirstName.required'     =>  'First name is required.',
            'strFirstName.unique_with'  =>  'Name already exists.',
            'strLastName.required'      =>  'Last name is required.',
            'strBirthdate.required'     =>  'Birth date is required.',
            'strGender.required'        =>  'Gender is required',
            'strContactNumber.regex'    =>  'Invalid contact number format.',
            'strEmail.email'            =>  'Invalid email format.',
            'strAddress.required'       =>  'Address is required.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
