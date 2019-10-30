<?php

require_once("./functions/crud.class.php");

class Cliente extends Crud {

	public function __construct() {

	}

	//Exemplo de Método de Listagem
	public function listaItens($sql){
		return $this->execute_query($sql);
	}

	public function cadastraItens($sql){
		return $this->execute_query($sql);
    }
    
		
}

?>