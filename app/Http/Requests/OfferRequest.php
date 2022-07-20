<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
        return [
            'name_ar' => 'required|max:100|unique:offers,name_ar',
            'name_en' => 'required|max:100|unique:offers,name_en',
            'price' => 'required|numeric',
            'details_ar' => 'required|max:100',
            'details_en' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => __('messages.offer name is required'), // __ this is or trans
            'name_en.unique' => __('messages.offer name must be unique'), // __ this is or trans
            'name_ar.required' => __('messages.offer name is required'), // __ this is or trans
            'name_en.unique' => __('messages.offer name must be unique'), // __ this is or trans
            'price.numeric' =>  __('messages.The offer price must be numbers'),
            'price.required' => __('messages.Price is required'),
            'details_ar.required' => __('messages.Details is required'),
            'details_en.required' => __('messages.Details is required'),
        ];
    }

}
