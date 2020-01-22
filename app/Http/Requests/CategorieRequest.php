<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => 'required|max:100',
                    'slug' => 'required|max:255',
                    'image' => 'required|image|mimes:' . implode(",", config('imageable.mimes')) . '|max:' . config('imageable.max_file_size'),
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|max:100',
                    'slug' => 'required|max:255',
                    'image' => 'image|mimes:' . implode(",", config('imageable.mimes')) . '|max:' . config('imageable.max_file_size'),
                ];
            }
        }
    }
}
