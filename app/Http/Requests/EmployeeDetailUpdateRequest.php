<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\BloodTypeEnum;

class EmployeeDetailUpdateRequest extends FormRequest
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
        // dd(BloodTypeEnum::getBloodTypes());
        return [
            'employee_id' => 'required|exists:employee,id',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'age' => 'required|integer|min:0',
            'blood_type' => [
                'required',
                Rule::in(BloodTypeEnum::getBloodTypes()),
            ],
        ];
    }

    //Trim and switch the value to Uppercase so that it eventually becomes case insensitive
    // Fixed method name in Laravel as prepareForValidation()
    protected function prepareForValidation() 
    {
        $this->merge([
            'blood_type' => trim(strtoupper($this->blood_type)),
        ]);

        // dd($this->all());
    }
}
