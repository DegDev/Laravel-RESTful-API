<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UserRequest extends ApiRequest
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
                        'email'      => 'required|email|unique:users',
                        'group_id'   => 'required|exists:groups,id',
                        'first_name' => 'required|string|max:25',
                        'last_name'  => 'required|string|max:25'
                    ];
                }

            case 'PATCH': {
                    return [
                        'email' => [
                            'required',
                            'email',
                            Rule::unique('users')->ignore($this->id)
                        ],
                        'group_id'   => 'required|exists:groups,id',
                        'first_name' => 'required|string|min:2|max:25',
                        'last_name'  => 'required|string|min:2|max:25',
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
            'email.required'      => 'Email is required!',
            'first_name.required' => 'First name is required!',
            'first_name.min'      => 'First name must be longer than 1 character!',
            'first_name.max'      => 'First name must be not longer than 25 characters!',
            'last_name.required'  => 'Last name is required!',
            'last_name.min'       => 'Last name must be longer than 1 character!',
            'last_name.max'       => 'Last name must be not longer than 25 characters!',
            'group_id.exists'     => 'Not an existing group ID'
        ];
    }
}