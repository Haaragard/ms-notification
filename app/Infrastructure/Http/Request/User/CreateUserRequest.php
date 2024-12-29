<?php

namespace App\Infrastructure\Http\Request\User;

use Hyperf\Validation\Request\FormRequest;
use Hyperf\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => Password::min(6)
                ->letters()
                ->numbers()
                ->symbols()
                ->max(30),
        ];
    }
}
