<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
            'firstname' => ['required', 'max:191'],
            'lastname' => ['required', 'max:191'],
            'company_id' => ['nullable', 'exists:companies,id'],
            'email' => ['nullable', 'max:191', 'email'],
            'phone' => ['nullable', 'max:191'],
        ];
    }
}
