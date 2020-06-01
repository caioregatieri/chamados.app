<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlaceRequest extends Request
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
            'departament_id' => 'required',
            'name' => 'required|min:5',
            'prefix' => 'required|min:1',
            'neighborhood' => 'required|min:4',
            'address' => 'required|min:8',
            'number' => 'required|min:2',
            'telephone1' => 'required|min:8',
            'region' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'departament_id.required' => 'Informe a secretaria',
            'name.required'           => 'Informe o nome',
            'name.min'                => 'O nome deve ter no mínimo 5 caracteres',
            'prefix.required'         => 'Informe o prefixo',
            'prefix.min'              => 'O prefixo deve ter no mínimo 1 caracter',
            'neighborhood.required'   => 'Informe o bairro',
            'neighborhood.min'        => 'O bairro deve ter no mínimo 4 caracteres',
            'address.required'        => 'Informe o logradouro',
            'address.min'             => 'O logradouro deve ter no mínimo 8 caracteres',
            'number.required'         => 'Informe o numero',
            'number.min'              => 'O numero deve ter no minimo 2 caracteres',
            'telephone1.required'     => 'Informe o telefone 1',
            'telephone1.min'          => 'O telefone 1 deve ter no mínimo 8 caracteres',
            'region.required'         => 'Informe a região',
        ];
    }
}
