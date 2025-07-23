<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', Password::defaults()],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome precisa ser preenchido',
            'surname.required' => 'O sobrenome precisa ser preenchido',
            'email.required' => 'O email precisa ser preenchido',
            'password.required' => 'A senha precisa ser preenchida',
        ];
    }

    /**
     * @return bool
     */
    public function register(): bool
    {
        $user = User::query()->create($this->validated());

        auth()->login($user);

        return true;
    }
}
