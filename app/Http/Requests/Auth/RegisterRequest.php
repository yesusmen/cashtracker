<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->symbols()
                    ->numbers()
                    ->uncompromised()
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'El campo email debe ser una dirección de correo válida.',
            'email.unique' => 'El email ya está registrado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.mixedCase' => 'La contraseña debe contener al menos una letra mayúscula y una letra minúscula.',
            'password.symbols' => 'La contraseña debe contener al menos un símbolo (!, @, #, $, %, ^, &, *, etc.).',
            'password.numbers' => 'La contraseña debe contener al menos un número.',
            'password.letters' => 'La contraseña debe contener al menos una letra.',
            'password.uncompromised' => 'La contraseña ha sido expuesta en una filtración de datos. Por favor, elige una contraseña diferente.',
        ];
    }
}
