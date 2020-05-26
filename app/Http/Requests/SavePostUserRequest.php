<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostUserRequest extends FormRequest
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
            'name'          =>  'required|string',
            'slug'          =>  'required|unique:posts,slug,' . $this->post['id'],
            'user_id'       =>  'required|integer',
            'category_id'   =>  'required|integer',
            'tags'          =>  'required|array',
            'body'          =>  'required',
            'excerpt'       =>  'required|string|min:20',
        ];
        if($this->get('file'))
        $rules = array_merge($rules, ['file' => 'mimes:jpg,jpeg,png']);

        return $rules;
    }
    public function messages()
    {
        return [
            'status.required' => 'Necesito ayuda!',
        ];

    }
}
