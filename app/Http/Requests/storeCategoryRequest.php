<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCategoryRequest extends FormRequest
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
            'name_en'=>'required',
            'name_ar'=>'required',
            'slug'=>'required',
            'description_en'=>'required',
            'description_ar'=>'required',
            'image'=>'required','image',
            'meta_title_en'=>'required',     
            'meta_title_ar'=>'required',       
            'meta_description_en'=>'required',
            'meta_description_ar'=>'required',
            'meta_keywords'=>'required',
            'is_showing'=>'required',
            'is_popular'=>'required',
        ];
    }
}