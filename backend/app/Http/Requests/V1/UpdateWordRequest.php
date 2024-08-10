<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateWordRequest extends FormRequest
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
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'wordName' => ['required'],
                'status' => ['required', Rule::in('N', 'R','D','n', 'r','d')],
            ];
        }else{
            return [
                'wordName' => ['sometimes','required'],
                'status' => ['sometimes','required', Rule::in('N', 'R','D','n', 'r','d')],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if($this->wordName){
            $this->merge([
                'word_name' => $this->wordName
            ]);
        }
        
    }
}
