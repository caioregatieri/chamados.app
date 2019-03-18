<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

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
        'register' => 'required|min:4|unique:users',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'confirm' => 'required'
      ];
    }

    public function messages()
    {
        return [
          'usertype_id.required' => 'O campo <b>tipo de usaário</b> é obrigatório.',
          'place_id.required' => 'O campo <b>setor</b> é obrigatório.',
          'name.required' => 'O campo <b>nome</b> é obrigatório.',
          'name.min' => 'O campo <b>nome</b> deve ter no minimo :min caracteres.',
          'register.required' => 'O campo <b>chapa</b> é obrigatório.',
          'register.min' => 'O campo <b>chapa</b> deve ter no minimo :min caracteres.',
          'register.unique' => 'O valor <b>chapa</b> já foi registrado por outro usuário.',
          'email.required' => 'O campo <b>e-mail</b> é obrigatório.',
          'email.email' => 'O campo <b>e-mail</b> não está em um formato válido.',
          'password.required' => 'O campo <b>senha</b> é obrigatório.',
          'password.min' => 'O campo <b>senha</b> deve ter no minimo :min caracteres.',
          'confirm.required' => 'O campo <b>confirmar senha</b> é obrigatório.'
        ];
    }
}
