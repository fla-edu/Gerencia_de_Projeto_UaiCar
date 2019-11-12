<?php

require_once '../config/conexao_db_acessos.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('DOMAIN_FQDN', 'NorthAmerica.DelphiAuto.net'); //Replace with REAL DOMAIN FQDN
define('LDAP_SERVER', '10.251.20.7');  //Replace with REAL LDAP SERVER Address

	//Basic Login verification

    $user = strip_tags($_POST['username']) .'@'. DOMAIN_FQDN;
    $pass = stripslashes($_POST['password']);

    $conn = ldap_connect("ldap://". LDAP_SERVER ."/");

    if (!$conn)
    	//aqui será adicionado a autenticação local.
        $err = 'Não foi possível conectar ao servidor de domínio.';

    else
    {
	//define('LDAP_OPT_DIAGNOSTIC_MESSAGE', 0x0032);  //Already defined in PHP 5.x  versions
        ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conn, LDAP_OPT_REFERRALS, 0);

        $bind = @ldap_bind($conn, $user, $pass);

        ldap_get_option($conn, LDAP_OPT_DIAGNOSTIC_MESSAGE, $extended_error);

        if (!empty($extended_error))
        {
            $errno = explode(',', $extended_error);
            $errno = $errno[2];
            $errno = explode(' ', $errno);
            $errno = $errno[2];
            $errno = intval($errno);

            if ($errno == 532)
                $err = 'Erro: Senha expirada, atualize e tente novamente.';
            	//echo 2;
        }

        elseif ($bind)
        {
      //determine the LDAP Path from Active Directory details
            $base_dn = array("CN=Users,DC=". join(',DC=', explode('.', DOMAIN_FQDN)), 
                "OU=Users,OU=People,DC=". join(',DC=', explode('.', DOMAIN_FQDN)));

            $result = ldap_search(array($conn,$conn), $base_dn, "(cn=*)");

            if (!count($result))
                $err = 'Erro: '. ldap_error($conn);            	

            else
            {
            	session_start();
            	 
                 //echo 1;
                // header('Location: template.php');
                
        /* Do your post login code here */
            }
        }
    }

    // session OK, redirect to home page
    // if (isset($_SESSION['redir']))
    // {
    //     header('Location: ../template.php');
    //     exit();
    // }

    // elseif (!isset($err))
    //     if(ldap_error($conn)=='Invalid credentials'){
    //         // $err = 'Erro: Usuário ou senha incorretos!'; 
    //         echo 0;
            
    // }
   
    if (!isset($err)){
        $err = 'Result: '. ldap_error($conn);
        $usuario = strip_tags($_POST['username']);        
        
        if($err == "Result: Success" || $err == "Result: Invalid credentials" || $err == "Result: Can't contact LDAP server"){  
            //Caso tenha sucesso na autenticação no AD, irá passar para a Stored Procedure(SP_LOGIN) o campo $valida_ldap como LDAP_SIM, para que possa fazer o procedimento de atualização de senha no db_ACESSOS, caso contrário irá passar $valida_ldap como LDAP_NAO e irá verificar se existe o usuário no banco bd_ACESSOS e validar.    
            if($err == "Result: Success"){
                 
                $valida_ldap = "LDAP_SIM";
                $_SESSION['ldap'] = $valida_ldap;               
            }else{
               
                session_start();    
                 
                $valida_ldap = "LDAP_NAO"; 
                $_SESSION['ldap'] = $valida_ldap;              
            }

            try{            
            $conexao    = Conexao::getConnection();
            $query = "SP_VALIDA_LOGIN_SAM '$usuario', '$pass', '$valida_ldap'";  
                              
            $comando = $conexao->prepare($query);
            $comando->execute();
        
            // retorno com JSON
            $resultado = $comando->fetchAll( PDO::FETCH_ASSOC );
            
            if($resultado[0]['RET_STATUS'] == "OK"){
                if(!isset($_SESSION['usuarioLogado'])){
                    
                    $_SESSION['usuarioLogado'] = $usuario;
                    $_SESSION['nomeUsuarioLogado'] = $resultado[0]['NOME']; 
                    $_SESSION['emailUsuarioLogado'] = trim($resultado[0]['EMAIL']);                    
                    // if($_SESSION['emailUsuarioLogado'] == ''){
                    //     $_SESSION['emailUsuarioLogado'] = 'avatar';    
                    // }
                    $_SESSION['telefoneUsuarioLogado'] = $resultado[0]['TELEFONE'];

                    // echo $_SESSION['usuarioLogado'];
                    // exit();
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

        }
    }

        

    ldap_close($conn);

?>


