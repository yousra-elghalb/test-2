<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
                    'name' => 'required|max:150',
                    'slug' => 'required|max:255',
                    'categorie_id' => 'required',
                    'image' => 'required|image|mimes:' . implode(",", config('imageable.mimes')) . '|max:' . config('imageable.max_file_size'),
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|max:150',
                    'slug' => 'required|max:255',
                    'categorie_id' => 'required',
                    'image' => 'image|mimes:' . implode(",", config('imageable.mimes')) . '|max:' . config('imageable.max_file_size'),
                ];
            }
        }
    }

}
