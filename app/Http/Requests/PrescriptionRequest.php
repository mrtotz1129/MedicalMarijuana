<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class PrescriptionRequest extends Request
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
            'medicineSelect'    =>  'required',
            'timesDayInput'     =>  'required|numeric',
            'intervalInput'     =>  'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'medicineSelect.required'   =>  'Medicine is required.',
            'timesDayInput.required'    =>  'Times/day is required.',
            'timesDayInput.numeric'     =>  'Times/day should be numeric.',
            'intervalInput.required'    =>  'Time interval is required.',
            'intervalInput.numeric'     =>  'Time interval should be numeric.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
