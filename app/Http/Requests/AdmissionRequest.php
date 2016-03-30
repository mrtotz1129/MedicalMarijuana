<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class AdmissionRequest extends Request
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
            'patientType'       =>  'required',
            'image'             =>  'image',
            'doctorSelect'      =>  'required',
            'strFirstName'      =>  'required|unique_with:tblEmployee,strMiddleName,strLastName',
            'strLastName'       =>  'required',
            'strBirthdate'      =>  'required',
            'bed'               =>  'required',
            'strGender'         =>  'required',
            'strContactNumber'  =>  'regex:/^\d{10}/',
            'strEmail'          =>  'email',
            'strAddress'        =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'patientType.required'      =>  'Patient type is required.',
            'image.image'               =>  'Image you uploaded is not an image',
            'doctorSelect.required'     =>  'Doctor is required.',
            'strFirstName.required'     =>  'First name is required.',
            'strFirstName.unique_with'  =>  'Name already exists.',
            'strLastName.required'      =>  'Last name is required.',
            'strBirthdate.required'     =>  'Birth date is required.',
            'bed.required'             =>  'Room is required.',
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
