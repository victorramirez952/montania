<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:50',
            'first_names' => 'required|max:50',
            'last_names' => 'required|max:50',
            'avatar_image' => 'nullable|image|max:1048',
            'type' => 'nullable|integer',
            'password' => 'required|string|max:255',

            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:250',
            'second_email' => 'nullable|email|max:50',
        ];
    }
}
