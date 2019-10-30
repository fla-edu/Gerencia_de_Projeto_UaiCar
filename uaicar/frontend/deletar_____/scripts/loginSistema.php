<?php

    require_once '../config/conexao.php';

    // Define as configurações do domínio.
    // gpresult /Z -> Comando para obter os dados do domínio
    $dn = "OU=Users,OU=BRSPESP,OU=Americas,OU=Sites,OU=APTIV,DC=aptiv,DC=com";
    
    // Dados do servidor LDAP
    $servidor_ldap = "aptiv.com";

    // Atributos que serão pesquisados
    $attributes = array("sn","givenname","mail");

    $usuario = strip_tags($_POST['username']);
    $senha = stripslashes($_POST['password']);   


    // Realiza a conexão
    $con = ldap_connect("ldap://". $servidor_ldap ."/")
          or die("Não foi possível conectar no servidor informado!");
  
    ldap_set_option($con, LDAP_OPT_PROTOCOL_VERSION, 3);

    $bd = ldap_bind($con,"APTIV\\".$usuario."",$senha);
          // or die("Erro, não foi possível validar os dados!");
    
    $result = ldap_search($con, $dn, '(|(samaccountname='.$usuario.'))', $attributes);   
    
    try{            
            $conexao    = Conexao::getConnection();

            if(!empty($result)){
                $entries = ldap_get_entries($con, $result);
               
                $nomeCompletoAD = $entries[0]["givenname"][0]." ". $entries[0]["sn"][0];
                $emailUsuarioAD = $entries[0]["mail"][0];  
                
                session_start();
                $valida_ldap = "LDAP_SIM";
                $_SESSION['ldap'] = $valida_ldap;
               


            }else{
                $nomeCompletoAD = "";
                $emailUsuarioAD = "";
                session_start(); 
                $valida_ldap = "LDAP_NAO"; 
                $_SESSION['ldap'] = $valida_ldap;
              

            }
            
            $query = "SP_VALIDA_LOGIN_AD '$usuario','$nomeCompletoAD','$emailUsuarioAD', '$senha', '$valida_ldap'";  
                              
            //echo $query;

            //exit();


            $comando = $conexao->prepare($query);
            $comando->execute();
        
            // retorno com JSON
            $resultado = $comando->fetchAll( PDO::FETCH_ASSOC );           
           
            if($resultado[0]['RET_STATUS'] == "OK"){
              
                if(!isset($_SESSION['nomeUsuarioLogado'])){                   
                    $_SESSION['nomeUsuarioLogado'] = $resultado[0]['NOME'];                
                    // $_SESSION['matriculaColaborador'] = $resultado[0]['MATRICULA'];                    
                    // $_SESSION['idUsuarioAcessos'] = $resultado[0]['ID_USUARIO_ACESSOS'];
                //    echo $_SESSION['nomeUsuarioLogado'];
                }
                         
            }   
            
            $json = json_encode($resultado, JSON_UNESCAPED_UNICODE);
            echo $json;            
            // exit();

            //echo 1;

            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }

    ldap_unbind($con);

?>