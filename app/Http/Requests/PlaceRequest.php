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
}
