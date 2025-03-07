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

        $userId = $this->route('user') ? $this->route('user')->id : $this->user()->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($userId),
            ],
            'phonenumber' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'national_insurance_number' => ['nullable', 'string', 'max:255'],
            'admin' => 'nullable|in:0,1',
        ];
    }
}
