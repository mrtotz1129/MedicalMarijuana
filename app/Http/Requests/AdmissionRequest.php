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
            'intDoctorId'      =>  'required',
            'intBedId'               =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'intDoctorId.required'      =>  'Doctor is required.',
            'intBedId.required'         =>  'Bed is required.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
