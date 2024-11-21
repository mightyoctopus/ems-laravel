<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\BloodTypeEnum;

class EmployeeDetailRequest extends FormRequest
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
            'employee_id' => 'required|exists:employee,id',
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'age' => 'required|integer|min:0',
            'blood_type' => 'required|in: '.implode(',', BloodTypeEnum::getBloodTypes()),
        ];
    }
}
