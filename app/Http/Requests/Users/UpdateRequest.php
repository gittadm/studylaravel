<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'login' => 'required|string|min:3',
            'email' => 'required|email',
            'status' => [
                'required',
                'string',
                Rule::in(array_keys(User::getStatuses())),
            ],
        ];
    }

    public function messages()
    {
        return [
            'login.min' => 'Короткий логин',
        ];
    }
}
