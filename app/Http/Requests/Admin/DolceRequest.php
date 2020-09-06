<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DolceRequest extends FormRequest
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
            'nome' => [
                'required',
                'regex:/^[-a-zA-Z0-9\s_]+$/',
                Rule::unique('dolci', 'nome')->ignore($this->dolce),
            ]
        ];
    }

    public function response(array $errors){
        
        return redirect()->route('admin.dolci.index')
        ->withErrors($errors);
       
    }
}
