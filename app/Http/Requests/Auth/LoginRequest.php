<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'email.required' => 'O email deve ser preenchido.',
            'email.email' => 'O campo deve ser um email',
            'password.required' => 'O campo deve ser preenchido.',
        ];
    }

    public function login(): bool {
        $user = User::query()->where('email', $this->email)->first();

        if(!$user)
            return false;

        if(!Hash::check($this->password, $user->password))
            return false;

        auth()->login($user);
        return true;
    }
}
