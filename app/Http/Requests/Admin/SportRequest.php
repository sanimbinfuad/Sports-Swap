<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SportRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Admin-only access is already enforced by the role middleware on the routes.
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100',
                Rule::unique('sports', 'name')->ignore($this->route('sport'))],
            'sport_category_id' => ['required', 'exists:sport_categories,id'],
            'description' => ['nullable', 'string', 'max:500'],
            'is_active' => ['boolean'],
        ];
    }
}
