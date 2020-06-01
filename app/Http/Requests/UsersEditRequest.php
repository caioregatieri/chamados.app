<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersEditRequest extends Request
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
        ];
    }

    public function messages()
    {
        return [
          'usertype_id.required' => 'O campo <b>tipo de usuário</b> é obrigatório.',
          'place_id.required' => 'O campo <b>setor</b> é obrigatório.',
          'name.required' => 'O campo <b>nome</b> é obrigatório.',
          'name.min' => 'O campo <b>nome</b> deve ter no minimo :min caracteres.',
          'register.required' => 'O campo <b>chapa</b> é obrigatório.',
          'register.min' => 'O campo <b>chapa</b> deve ter no minimo :min caracteres.',
          'register.unique' => 'O valor <b>chapa</b> já foi registrado por outro usuário.',
          'email.required' => 'O campo <b>e-mail</b> é obrigatório.',
          'email.email' => 'O campo <b>e-mail</b> não está em um formato válido.',
        ];
    }
}
