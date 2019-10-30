<?php

/*****************************************************************************

	* Arquivo: index.php
	* Descrição: Localiza e efetua a operação HTTP desejada
	* 	para determinado método/função do sistema
	* 	baseado nos parâmetros chave recebidos, exemplo:
	* $_GET['index'] = 1 && $_GET['controlle'] = 'NomeDaClasse'
	* Os parâmetros acima serão responsáveis por invocar o método de listar
	* os registros contido na tablea controlada pelo controller 'NomeDaclasse'

*******************************************************************************/


/*******************************************************************************/


$method = $_SERVER['REQUEST_METHOD'];
error_reporting(0);


if($method == 'GET'){


}else if($method == 'POST'){

	//////// FUNCIONÁRIOS ///////////

	// INSERE FUNCIONÁRIO - MODAL
	if($_POST['insert'] == 1 && $_POST['controller'] == 'Funcionario'){

		$nome = $_POST['nome']; 
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$tipo = $_POST['tipo'];
		
		require_once("./controller/Funcionario.controller.class.php");
		$controller = new Funcionario;
		$controller->listaItens("proc_INSERE_FUNCIONARIO '$nome', '$email', '$senha', '$tipo'");
	}	
	
	// CONSULTA FUNCIONÁRIOS - DATATABLE
	if($_POST['read'] == 1 && $_POST['controller'] == 'Funcionario'){


		require_once("./controller/Funcionario.controller.class.php");
		$controller = new Funcionario;
		$controller->listaItens("proc_CONSULTA_FUNCIONARIO");
		
	}  

	// ATUALIZA FUNCIONÁRIO 
	if($_POST['update'] == 1 && $_POST['controller'] == 'Funcionario'){

		$ID = $_POST['ID']; 
		$email = $_POST['email'];
		$tipo = $_POST['tipo'];
		$ativo = $_POST['ativo'];

		require_once("./controller/Funcionario.controller.class.php");
		$controller = new Funcionario;
		$controller->listaItens("proc_ALTERA_FUNCIONARIO $ID, '$email', '$tipo', '$ativo'");
		
	}  

	//////////// CLIENTES ////////
	if($_POST['insert'] == 1 && $_POST['controller'] == 'Cliente'){

		$nome = $_POST['nome']; 
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cnh = $_POST['cnh'];
		$nascimento = $_POST['nascimento']; 
		$estado = $_POST['estado'];
		$cidade = $_POST['cidade'];
		$endereco = $_POST['endereco'];


		require_once("./controller/Cliente.controller.class.php");
		$controller = new Cliente;
		$controller->listaItens("proc_INSERE_CLIENTE '$nome', '$email', '$rg', '$cnh', '$nascimento', '$estado', '$cidade', '$endereco'");
	}	
	
	// CONSULTA CLIENTES - DATATABLE
	if($_POST['read'] == 1 && $_POST['controller'] == 'Cliente'){

		$id = $_POST['id'];

		require_once("./controller/Cliente.controller.class.php");
		$controller = new Cliente;
		$controller->listaItens("proc_CONSULTA_CLIENTE_ID '$id'");
		
	}  

	// ATUALIZA CLIENTES 
	if($_POST['update'] == 1 && $_POST['controller'] == 'Cliente'){

		$ID = $_POST['id']; 
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$rg = $_POST['rg'];
		$cnh = $_POST['cnh'];
		$nascimento = $_POST['nascimento']; 
		$estado = $_POST['estado'];
		$cidade = $_POST['cidade'];
		$endereco = $_POST['endereco'];

		require_once("./controller/Cliente.controller.class.php");
		$controller = new Cliente;
		$controller->listaItens("proc_ALTERA_CLIENTE $ID, '$nome', '$email', '$rg', '$cnh', '$nascimento', '$estado', '$cidade', '$endereco'");
		
	}  

	// CONSULTA CLIENTES - DATATABLE
	if($_POST['read'] == 2 && $_POST['controller'] == 'Cliente'){


		require_once("./controller/Cliente.controller.class.php");
		$controller = new Cliente;
		$controller->listaItens("proc_CONSULTA_CLIENTE");
		
	}  
}


  