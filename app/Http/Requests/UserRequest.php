<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|min:2',
            'province' => 'required',
            'salary' => 'required',
        ];
        
        if ($this->input('province') == 'Québec') {
            $rules['salary'] = ['regex:/^(((\d)|(\d\d)|(\d\d\d))(\xA0|\x20))*((\d)|(\d\d)|(\d\d\d))([,.]\d*)?$/'];
        }
        else
            $rules['salary'] = ['regex:/^(\d{1,3}(\,\d{3})*|(\d+))(\.\d{2})?$/'];
            

        return $rules;
    }
}
