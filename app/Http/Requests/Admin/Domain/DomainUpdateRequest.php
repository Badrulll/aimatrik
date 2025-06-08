<?php

namespace App\Http\Requests\Admin\Domain;

use Illuminate\Foundation\Http\FormRequest;

class DomainUpdateRequest extends FormRequest
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
            'code' => 'required|string|max:266|unique:domains,code,'.$this->id,
            'name' => 'required|string|max:266',
            'is_active' => 'nullable',
        ];
    }
}
