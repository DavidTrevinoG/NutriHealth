<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'peso' => ['numeric', 'min:0'],
            'calorias' => ['numeric', 'min:0'],
            'edad' => ['numeric', 'min:0'],
            'estatura' => ['numeric', 'min:0'],
            'sexo' => ['string', Rule::in(['Masculino', 'Femenino'])],
            'profile_photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png'],
        ];
    }
}
