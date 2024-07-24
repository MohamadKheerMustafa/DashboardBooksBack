<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeComparisonsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You may add your authorization logic here
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'books' => 'required|array|size:2',
            'books.*' => 'exists:books,id',
            'similarity_rating' => 'required|integer|min:1|max:5',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'books.required' => 'Please, select 2 books',
            'books.array' => 'Books must be an array',
            'books.size' => 'Please, select only 2 books',
            'books.*.exists' => 'One or both of the selected books do not exist',
            'similarity_rating.required' => 'Similarity rating is required',
            'similarity_rating.integer' => 'Similarity rating must be an integer',
            'similarity_rating.min' => 'Similarity rating must be at least 1',
            'similarity_rating.max' => 'Similarity rating cannot be more than 5',
        ];
    }
}
