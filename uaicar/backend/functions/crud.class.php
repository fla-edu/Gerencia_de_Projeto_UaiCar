<?php 
/*
* 	Descrição do Arquivo
* 	@autor - João Ricardo Gomes dos Reis
* 	@data de criação - dd/mm/aaaa
* 	@arquivo - controller.class.php
*/
//Importa a classe
require_once("./functions/connection.class.php");

abstract class Crud {

     /**
     *
     * @method execute_query
     * @param $sql (SQL Script que será executado no banco)
     * @return true || false
     *
     * */
	
    
    public function execute_query($sql) {

	  	$conexao  = Connection::getConnection();
        $sql = $conexao->prepare($sql);
        $sql->execute();

        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        echo $response = json_encode($resultado,JSON_UNESCAPED_UNICODE);

        //echo  $response = json_encode( array('data' =>  $resultado), JSON_UNESCAPED_UNICODE  );
   
    }


    public function execute_query_data_table($sql) {

      $conexao  = Connection::getConnection();
      $sql = $conexao->prepare($sql);
      $sql->execute();

      $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
      //echo $response = json_encode($resultado,JSON_UNESCAPED_UNICODE);
      //echo  $response = json_encode( array('data' =>  $resultado), JSON_UNESCAPED_UNICODE  );

      $result = array();

      for ($i=0; $i < count($resultado) ; $i++) {

            $result[] = array_values($resultado[$i]);
      }

      echo json_encode($result,JSON_UNESCAPED_UNICODE);
 
  }
}
?>