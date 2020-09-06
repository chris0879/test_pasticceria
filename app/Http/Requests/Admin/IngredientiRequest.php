<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IngredientiRequest extends FormRequest
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
                Rule::unique('ingredienti', 'nome')->ignore($this->ingredienti),
            ]
        ];
    }

    public function response(array $errors){
        
        return redirect()->route('admin.ingredienti.index')
        ->withErrors($errors);
       
    }
}
