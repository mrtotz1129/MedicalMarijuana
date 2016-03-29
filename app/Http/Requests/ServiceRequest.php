<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class ServiceRequest extends Request
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
            'strServiceName'    =>  'required',
            'dblPrice'          =>  'required|numeric',
            'intDepartmentId'   =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'strServiceName.required'       =>  'Service name is required.',
            'dblPrice.required'             =>  'Service price is required.',
            'dblPrice.numeric'              =>  'Service price should be numeric.',
            'intDepartmentId.required'      =>  'Department is required.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
