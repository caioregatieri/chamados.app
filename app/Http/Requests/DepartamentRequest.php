<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartamentRequest extends Request
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
            'name'=>'required|min:4',
            'responsable'=>'required|min:4'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'O campo <b>nome</b> é obrigatório.',
          'name.min' => 'O campo <b>nome</b> deve ter no minimo :min caracteres.',
          'responsable.required' => 'O campo <b>responsável</b> é obrigatório.',
          'responsable.min' => 'O campo <b>responsável</b> deve ter no minimo :min caracteres.',
        ];
    }
}
