<?php

namespace App\Http\Requests\Common\Library;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_at_year' => 'required|integer',
            'description' => 'string|min:8|max:300',
            'available_amount' => 'integer|gte:0',
            'category_id' => 'nullable|exists:categories,id'
        ];
    }
}
