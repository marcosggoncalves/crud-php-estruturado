<?php

namespace Teste\Models;

use CoffeeCode\DataLayer\DataLayer;

class Veiculo extends DataLayer
{
    public function __construct()
    {
        parent::__construct("veiculos",['descricao_veiculo','placa_veiculo']);
    }
    
    public function all(){
        return $this->find()->fetch(true);
    }

    public function get($id){
        $result =  $this->findById($id);

        if(isset($result)) return $result->data();

        return [];
    }
}