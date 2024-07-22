<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentCreateRequest extends FormRequest
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
            "first_name" => "required|min:3|max:255",
            "last_name" => "required|min:3|max:255",
            "email" => "required|email|unique:students,email|min:5|max:255",
            "password" => "required",
            "age" => "required",
            "career_id" => ["required", Rule::exists('careers', 'id')]
        ];
    }
}
