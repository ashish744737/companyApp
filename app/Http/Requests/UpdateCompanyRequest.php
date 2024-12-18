<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCompanyRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $this->route('company')->id,
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url|max:255'
        ];
    }

    public function messages()
    {
        return [
            'logo.max' => 'The uploaded image must be below 2MB in size.',
            'logo.dimensions' => 'The image must have a minimum dimension of 100x100 pixels.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->is('api/*')) {
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422)
            );
        } else {
            parent::failedValidation($validator);
        }
    }
}
