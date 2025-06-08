<?php

namespace App\Http\Requests\Admin\BidangPraktik;

use Illuminate\Foundation\Http\FormRequest;

class BidangPraktikStoreRequest extends FormRequest
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
            'domain_id' => 'required|exists:domains,id',
            'code' => 'required|string|max:266|unique:bidang_praktiks,code',
            'bidang_kapabilitas_id' => 'required|exists:bidang_kapabilitas,id',
            'name' => 'required|string|max:266',
            'is_active' => 'nullable',
        ];
    }
}
