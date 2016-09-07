<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCertificate extends FormRequest
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
            'title'       => 'required|unique:certificates,title,'.$this->certifacte->id,
            'description' => 'required',
            'image'       => 'image|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function data()
    {
        $inputs = [
            'title'       => trim($this->get('title')),
            'description' => $this->get('description')
        ];

        if ($this->has('is_published'))
        {
            $inputs['is_published'] = true;
        } else {
            $inputs['is_published'] = false;
        }

        return $inputs;
    }
}
