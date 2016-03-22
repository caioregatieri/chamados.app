<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersCreateRequest extends Request
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
        'usertype_id' => 'required',
        'place_id' => 'required',
        'name' => 'required|min:8',
        'register' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'confirm' => 'required'
      ];
    }
}
