<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
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


     //Validation logic is pasted inside rules:
     //Reference Source: https://www.youtube.com/watch?v=ddWAmMf5hEU 

     //Phone/Email validation rules, referenced from https://laracasts.com/discuss/channels/laravel/validate-mobile-or-email

     public function rules()
    {
        $id = $this->route('id'); //Retrieve the id from the route
        
        return [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' => [
                'required', 
                'string',
                'regex:/^[0-9]{11}$/',
                Rule::unique('employees','phone')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('employees', 'email')->ignore($id),
            ],
        ];
    }

    // Referenced from https://www.youtube.com/shorts/jrCiEVGtOHs
    public function messages() 
    {
        return [
            'first_name.required' => 'The First Name field is required!',
            'last_name.required' => 'The Last Name field is required!',
            'phone.required' => 'The Phone field is required!',
            'email.required' => 'The Email field is required!',
        ];
    }
}

/*

Alos, put this in the blade view as below in order to reflect the logic into the frontend:
(Using the built-in $message property in blade)

@error('email')
    <span>{{ $message }}</span>
@enderror

*/