<?php

session_start();

$verifica_usuario = $_SESSION['ldap'];
$user = $_SESSION['usuarioLogado'];

$nome_user = strip_tags($_POST['nome_user']);
$email_user = trim(strip_tags($_POST['email_user']));
$telefone_user = ($_POST['telefone_user']);
$senha_antiga = stripslashes($_POST['senha_antiga']);
$senha_nova = stripslashes($_POST['senha_nova']);
$repetir_senha_nova = stripslashes($_POST['repetir_senha_nova']);


if($senha_nova == $repetir_senha_nova){
    $senha_nova = $senha_nova;
}else{
   
    $array = array( 'RET_STATUS' => 'ERRO' , 'RET_LOG' => 'Nova senha não confere, verifique os campos nova senha e repetir nova senha! Digite novamente!' );

    // $response = json_encode($array, JSON_UNESCAPED_UNICODE);
    
    echo $response = json_encode($json = array($array));
    // echo $response;
    exit();
}


//Conecta no banco de dados
require_once '../../config/conexao_db_acessos.php';

        
    try{

        $conexao    = Conexao::getConnection();
        $sql        = $conexao->prepare("SP_ATUALIZA_PERFIL_SAM '$user','$nome_user','$telefone_user','$email_user','$senha_antiga','$senha_nova','$verifica_usuario'");

        // $comando = "SP_ATUALIZA_PERFIL_USUARIO '$verifica_usuario','$nome_user','$email_user ','$senha_antiga','$senha_nova','$repetir_senha_nova'";

        // echo $comando;
        // exit();

        $sql->execute();
        
        $resultSql = $sql->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($resultSql);
        echo $response =  json_encode($resultSql);
      
    }catch(Exception $e){
        
        echo $e->getMessage();
        exit;
        //echo 2;
    }
    


?>