<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class GroupRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {

            case 'POST': {
                    return [
                        'name' => [
                            'required',
                            'string',
                            'min:5',
                            'max:25',
                            'unique:groups'
                        ]
                    ];
                }

            case 'PATCH': {
                    return [
                        'name' => [
                            'required',
                            'string',
                            'min:5',
                            'max:25',
                            Rule::unique('groups')->ignore($this->id)
                        ]
                    ];
                }
            default:break;
        }
    }
    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.min'      => 'Group name must be longer than 5 characters!',
            'name.max'      => 'Group name must be not longer than 25 characters!',            
        ];
    }
}