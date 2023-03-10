<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'documentType' => ['required', 'string', 'max:255'],
            'documentNumber' => ['required', 'numeric', 'digits_between:5,20', 'unique:employees'],
            'phoneNumber' => ['required', 'numeric', 'digits_between:10,20', 'unique:employees'],
            'address' => ['required', 'string', 'max:255'],
            'hiringDate' => ['required', 'date', 'max:255'],
            'salary' => ['required', 'numeric', 'digits_between:6,20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
