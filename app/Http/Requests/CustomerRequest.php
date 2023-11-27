<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:50',
            'first_names' => 'required|max:50',
            'last_names' => 'required|max:50',
            'avatar_image' => 'nullable|file',
            'type' => 'nullable|integer',
            'password' => 'nullable|string|max:255',

            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:250',
            'second_email' => 'nullable|email|max:50',
        ];
    }
}
