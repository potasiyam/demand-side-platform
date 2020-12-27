<?php

namespace App\Http\Requests;

use App\Transformer\ApiResponseTransformer;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCampaign extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "start_date" => "required|date_format:Y-m-d",
            "end_date" => "required|date_format:Y-m-d",
            "total_budget" => "required|numeric",
            "daily_budget" => "required|numeric",
            "creatives" => "array",
            "creatives.*" => "mimes:jpg,jpeg,png,bmp|max:20000"
        ];
    }


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'creatives.*.required' => 'Please upload an image',
            'creatives.*.mimes' => 'Only jpeg,png and bmp images are allowed',
            'creatives.*.max' => 'Sorry! Maximum allowed size for an image is 20MB',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponseTransformer::error($validator->errors(), 'Update campaign request failed', 422)
        );
    }
}
