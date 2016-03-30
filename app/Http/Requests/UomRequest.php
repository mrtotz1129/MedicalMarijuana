<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class UomRequest extends Request
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
            'strMeasurementName'            =>  'required',
            'strMeasurementAbbrev'          =>  'required',
            'dblEquivalent'                 =>  'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'strMeasurementName.required'               =>  'Measurement name is required.',
            'strMeasurementAbbrev.required'             =>  'Measurement abbreviation is required.',
            'dblEquivalent.numeric'                     =>  'Equivalent should be numeric.',
            'dblEquivalent.required'                    =>  'Equivalent is required.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
