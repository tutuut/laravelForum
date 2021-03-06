<?php

namespace App\Http\Requests\Api;

class ImageRequest extends FormRequest
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
    {
        $rules = [
            'type' => 'required|string|in:avatar,topic',
        ];
        if($this->type == 'avatar') {
            $rules['image'] = 'required|mimes:jpeg,jpg,bmp,png,gif|dimensions:min_width=200,min_heitght=200';
        } else {
            $rules['image'] = 'required|mimes:jpeg,jpg,bmp,png,git';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'image.dimensions' => '图片的清晰度不够，宽和高需要200px以上',
        ];
    }
}
