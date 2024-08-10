<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWordRequest extends FormRequest
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
            'word_name' => ['required'],
            'status' => ['required', Rule::in('N', 'R','D','n', 'r','d')],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'word_name' => $this->wordName
        ]);
    }
}
