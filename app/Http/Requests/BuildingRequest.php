<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class BuildingRequest extends Request
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
            'strBuildingName'       =>  'required|unique:tblBuilding',
            'strBuildingLocation'   =>  'required',
            'intFloorDesc'          =>  'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'strBuildingName.required'      =>  'Building name is required.',
            'strBuildingName.unique'        =>  'Building name already exists.',
            'strBuildingLocation.required'  =>  'Building location is required.',
            'intFloorDesc.required'         =>  'Number of floors is required.',
            'intFloorDesc.numeric'           =>  'Number of floors should be numeric.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
