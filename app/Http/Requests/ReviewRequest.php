<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
    public function rules(){
        return [
            'text' => 'required',
            // 'id_customer' => 'required|integer|exists:customers,id_customer', // Assuming 'customers' is the related table
            // 'id_project' => 'required|integer|exists:projects,id_project', // Assuming 'projects' is the related table
        ];
    }
    }
