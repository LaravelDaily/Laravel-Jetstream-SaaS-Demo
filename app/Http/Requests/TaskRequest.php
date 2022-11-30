<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string'],
            'category_id' => ['integer', 'exists:categories,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
