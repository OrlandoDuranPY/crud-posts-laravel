<?php

namespace App\Http\Requests\Post;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreRequest extends FormRequest
{

    /* ========================================
    Preparar el slug para la URL
    ========================================= */
    protected function prepareForValidation(){
        $this->merge([
            'slug' => str($this->title)->slug()
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(Validator $validator)
    {
        if ($this->expectsJson()) {
            $response = new Response($validator->errors(), 400);
            throw new ValidationException($validator, $response);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:500',
            'slug' => 'required|min:5|max:500|unique:posts',
            'content' => 'required|min:5',
            'description' => 'required|min:5',
            'image' => 'mimes:jpeg,jpg,png|max:10240',
            'posted' => 'required',
            'category_id' => 'required',

        ];
    }
}
