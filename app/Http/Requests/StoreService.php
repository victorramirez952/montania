<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreService extends FormRequest
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
            'name' => ['required', 'min:3'],
            'cover_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust image validation as needed
            'duration' => 'required|integer',
            'time_units' => 'required|max:50',
            'sessions_number' => 'required|integer',
            'link_booking' => 'nullable|url',
            'principal_service' => 'nullable|boolean',
            'description' => 'nullable|required|min:3|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'La descripcion es obligatoria',
        ];
    }
}
