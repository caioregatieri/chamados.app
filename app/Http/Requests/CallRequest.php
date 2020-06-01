<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CallRequest extends Request
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
          'user'=>'required',
          'departament'=>'required',
          'place'=>'required',
          'requester'=>'required|min:5',
          'requester_email'=>'required|email',
          'title'=>'required|min:10',
          'description'=>'required|min:10'
        ];
    }

    public function messages()
    {
        return [
          'user.required' => 'O campo <b>usuário</b> é obrigatório.',
          'departament.required' => 'O campo <b>secretaria</b> é obrigatório.',
          'place.required' => 'O campo <b>setor</b> é obrigatório.',
          'requester.required' => 'O campo <b>Solicitante</b> é obrigatório.',
          'requester.min' => 'O campo <b>Solicitante</b> deve ter no minimo :min caracteres.',
          'requester_email.required' => 'O campo <b>Solicitante</b> é obrigatório.',
          'requester_email.email' => 'O campo <b>E-mail</b> não é válido',
          'title.required' => 'O campo <b>titulo</b> é obrigatório.',
          'description.required' => 'O campo <b>descrição</b> é obrigatório.',
          'title.min' => 'O campo <b>titulo</b> deve ter no minimo :min caracteres.',
          'description.min' => 'O campo <b>descrição</b> deve ter no minimo :min caracteres.'
        ];
    }
}
