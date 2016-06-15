<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImageUploadFormRequest extends Request
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
     * @return array
     */
    public function rules()
   // {
        {
        return [
          'image' => 'required',
//          'url' => 'required|url',
//          'category' => 'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Please upload an image',
//            'url.required' => 'Please provide a URL',
//            'url.url' => 'A valid URL is required',
//            'category.required' => 'Please associate this link with a category',
//            'category.min' => 'Please associate this link with a category'
        ];
    }


}
