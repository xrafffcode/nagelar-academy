<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'youtube_url' => 'string|max:255|nullable',
            'description' => 'required|string',
            'map_location' => 'string|nullable',
            'address' => 'string|nullable',
            'category_id' => 'required',
            'mentor_id' => 'required',
            'price' => 'required',
            'system' => 'required|string',
            'level' => 'required|string',
            'training_info' => 'required|string',
        ];
    }
}
