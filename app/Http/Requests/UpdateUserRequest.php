<?php

namespace Modules\User\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'    => ['required', 'string', 'min:3', 'max:32'],
            'last_name'     => ['required', 'string', 'min:3', 'max:32'],
            'username'      => ['nullable', 'string', 'min:3', 'max:16', "unique:users,username,{$this->id},id"],
            'phone'         => ['required', 'numeric', 'starts_with:+,234,0', "unique:users,phone,{$this->id},id"],
            'email'         => ['nullable', 'email', 'min:3', 'max:32', "unique:users,email,{$this->id},id"],
            'image'         => ['nullable', 'image', 'mimes:png,jpg,svg'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // return $this->user()->can('example.create');
    }
}
