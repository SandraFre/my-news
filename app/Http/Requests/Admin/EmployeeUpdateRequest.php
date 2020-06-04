<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'nullable|string|max:30',
            'last_name' => 'nullable|string|max:50',
            'email' => [
                'required',
                'email',
            Rule::unique('admins')->ignoreModel($this->route()->parameter('employee'))],
            'password' => 'nullable|confirmed|min:8',
        ];
    }

    public function getData(): array
    {
        $data = [
            'first_name' => $this->input('first_name'),
            'last_name' => $this->input('last_name'),
            'email' => $this->input('email'),
        ];

        if ($password = $this->input('password')) {
            $data['password'] = bcrypt($password);
        }

        return $data;
    }
}
