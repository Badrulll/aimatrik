<?php

namespace App\Http\Requests\Admin\Praktik;

use App\Constants\AppConst;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PraktikStoreRequest extends FormRequest
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
            'bidang_kapabilitas_id' => 'required|exists:bidang_kapabilitas,id',
            'bidang_praktik_id' => 'required|exists:bidang_praktiks,id',
            'kategori_level' => 'required|'.Rule::in(AppConst::LEVEL_ARR),
            'praktik' => 'required|string|max:2500',
            'is_active' => 'nullable',
        ];
    }
}
