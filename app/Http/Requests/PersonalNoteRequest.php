<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonalNoteRequest extends Request
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
          'user_id'=>'required',
          'title'=>'required|min:5',
          'description'=>'required|min:8'
        ];
    }

    public function messages()
    {
        return [
          'user_id.required' => 'O campo <b>usuário</b> é obrigatório.',
          'title.required' => 'O campo <b>titulo</b> é obrigatório.',
          'description.required' => 'O campo <b>descrição</b> é obrigatório.',
          'title.min' => 'O campo <b>titulo</b> deve ter no minimo :min caracteres.',
          'description.min' => 'O campo <b>descrição</b> deve ter no minimo :min caracteres.'
        ];
    }
}
