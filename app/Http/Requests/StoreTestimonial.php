<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonial extends FormRequest {

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
            'customer_id' => 'required',
            'quote'       => 'required'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'quote'        => trim($this->get('quote')),
            'customer_id'  => $this->get('customer_id'),
            'is_published' => false
        ];

        if ($this->has('is_published'))
            $inputs['is_published'] = true;

        return $inputs;
    }
}
