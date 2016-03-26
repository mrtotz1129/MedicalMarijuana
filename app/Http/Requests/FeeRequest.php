<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class FeeRequest extends Request
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
            'strFeeName'    => 'unique:tblFee|required',
            'dblPrice'      => 'numeric|required'
        ];
    }

    public function messages()
    {
        return [
            'strFeeName.unique'     =>  'Fee name already exists.',
            'strFeeName.required'   =>  'Fee name is required.',
            'dblPrice.numeric'      =>  'Fee price should be numeric.',
            'dblPrice.required'     =>  'Fee price is required.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
