<?php

    // Esse arquivo precisa ser convertido para o padrão do projeto.

    require_once '../functions/connection.class.php';

    $usuario = strip_tags($_POST['username']);
    $senha = stripslashes($_POST['password']);   

 
    
    try{            
            
            $conexao  = Connection::getConnection();

            
            $query = "proc_VALIDA_LOGIN '$usuario', '$senha' ";  
                              
            $comando = $conexao->prepare($query);
            $comando->execute();
        
            // retorno com JSON
            $resultado = $comando->fetchAll( PDO::FETCH_ASSOC );           
           
            session_start();
            if(isset($resultado[0]['ID']) == "1"){
                $_SESSION['nomeUsuarioLogado'] = $resultado[0]['Nome']; 
                $_SESSION['email'] = $resultado[0]['Email'];                     
            }   
            
            $json = json_encode($resultado, JSON_UNESCAPED_UNICODE);
            echo $json;            

            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }


?>