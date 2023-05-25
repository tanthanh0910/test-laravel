<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminSaveUserRequest extends FormRequest
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
    public function rules(): array
    {
        $rule =  [
            'full_name' => 'required|max:50',
            'user_name' => ['required', Rule::unique('users')->ignore(request()->route('user')), 'max:50'],
            'password' => 'nullable|confirmed|min:6',
            'password_confirmation' => 'nullable|min:6',
            'role_id' => ['required', Rule::in(User::ROLE_AVAILABLE)],
        ];

        return $rule;
    }

}
