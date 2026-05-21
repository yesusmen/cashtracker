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

    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols(),

            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El campo :attribute es obligatorio.',
            'name.string' => 'El campo :attribute debe ser una cadena de texto.',
            'name.max' => 'El campo :attribute no debe exceder los :max caracteres.',
            'email.required' => 'El campo :attribute es obligatorio.',
            'email.email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'email.unique' => 'El :attribute ya está en uso.',
            'password.required' => 'El campo :attribute es obligatorio.',
            'password.string' => 'El campo :attribute debe ser una cadena de texto.',
            'password.min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'password.confirmed' => 'La confirmación de :attribute no coincide.',
        ];
    }
}
