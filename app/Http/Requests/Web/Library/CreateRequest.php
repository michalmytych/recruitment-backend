<?php

namespace App\Http\Requests\Web\Library;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->isMethod('GET')) {
            return [];
        }

        return [
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'published_at_year' => ['required|integer'],
            'description' => ['required|min:8|max:300'],
            'available_amount' => ['integer|gte:0'],
        ];
    }
}
