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
          'title'=>'required|min:5',
          'description'=>'required|min:10'
        ];
    }
}
