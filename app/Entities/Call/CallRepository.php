<?php

/*
Autor: Caio Regatieri
E-mail: caio.cesar.regatieri@gmail.com
Description: Sistema desenvolvido para controle de chamados 
*/

namespace App\Entities\Call;

use Call;
use DB;

class CallRepository
{
	private $entity;

	public function __construct(Call $entity){
		$this->entity = $entity;
	}

	public function DBSelect($conditions = array(), $order = ''){
		//comando a ser executado
      	$q = 'select c.id, c.created_at,  c.title, '.
                'p.name as place,	'.
                'd.name as departament, '.
                'm.name as mode, '.
                's.name as status, s.color '.
          	'from calls c '.
          	'inner join places p on c.place_id = p.id '.
          	'inner join departaments d on p.departament_id = d.id '.
          	'inner join callmodes m on c.mode_id = m.id '.
          	'inner join ( '.
                    'select call_id, status_id '.
                    'from callhistories '.
                    'group by call_id '.
                    ') h on  h.call_id = c.id '.
          	'inner join callstatuses s on s.id = h.status_id ';

        //condições
        $w = '';

        //monta as condições
        if ($conditions.count()){
        	foreach ($variable as $key) {
        		if ($w == ''){
        			$w = $w . ' where ' . $key[0] . ' ' . $key[1] . ' ' . $key[2];
        		}else{
        			$w = $w . ' and ' . $key[0] . ' ' . ($key[1] == '' ? '=' : $key[1]) . ' ' . $key[2];
        		}
        	}
        }

        //ordena o resultado
       	if($order != '')
      		$q =  $q . $w . ' order by ' . $order;

      	//faz a consulta
      	$dados = DB::select($q);

      	//retorna os dados
      	return $dados
	}
  
}