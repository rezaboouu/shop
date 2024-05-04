<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            "author_id" => "nullable|string",
            "category_id" => "nullable|string",
            "slug" => "nullable",
            "title" => "nullable",
            "published" => "nullable",
            "summary" => "nullable",
            "content" => "nullable",
        ];
    }
}
