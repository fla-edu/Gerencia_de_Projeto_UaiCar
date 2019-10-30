<?php

define('DB_HOST'        , "10.251.19.79");
define('DB_USER'        , "sa");
define('DB_PASSWORD'    , "P@ssw0rd");
define('DB_NAME'        , "db_sam");
define('DB_DRIVER'      , "sqlsrv");
  
//define('DB_HOST'        , "10.251.19.14");
//define('DB_USER'        , "manifesto");
//define('DB_PASSWORD'    , "m@nifesto#01");
//define('DB_NAME'        , "db_manifesto_digital");
//define('DB_DRIVER'      , "sqlsrv");

class Conexao
{
   private static $connection;
  
   private function __construct(){}
  
   public static function getConnection() {
  
       $pdoConfig  = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
       $pdoConfig .= "Database=".DB_NAME.";";
       
       try {
           if(!isset($connection)){
               $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
               $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
           }
           
           return $connection;
       } catch (PDOException $e) {
           $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
           $mensagem .= "\nErro: " . $e->getMessage();
           throw new Exception($mensagem);
       }
   }

   
}