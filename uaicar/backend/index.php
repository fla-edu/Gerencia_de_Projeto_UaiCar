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
		$ativo = $_POST['ativo'];

		require_once("./controller/Cliente.controller.class.php");
		$controller = new Cliente;
		$controller->listaItens("proc_ALTERA_CLIENTE $ID, '$nome', '$email', '$rg', '$cnh', '$nascimento', '$estado', '$cidade', '$endereco', '$ativo'");
		
	}  

	// CONSULTA CLIENTES - DATATABLE
	if($_POST['read'] == 2 && $_POST['controller'] == 'Cliente'){


		require_once("./controller/Cliente.controller.class.php");
		$controller = new Cliente;
		$controller->listaItens("proc_CONSULTA_CLIENTE");
		
	}  

		// CONSULTA FUNCIONÁRIOS - DATATABLE
	if($_POST['read'] == 2 && $_POST['controller'] == 'Funcionario'){


			require_once("./controller/Funcionario.controller.class.php");
			$controller = new Funcionario;
			$controller->listaItens("proc_CONSULTA_FUNCIONARIO_INATIVO");
	}  

	//////////// VEÍCULOS ////////
	if($_POST['insert'] == 1 && $_POST['controller'] == 'Veiculo'){

		$marca = $_POST['marca']; 
		$modelo = $_POST['modelo'];
		$placa = $_POST['placa'];
		$ano = $_POST['ano'];
		$km_inicial = $_POST['km_inicial']; 
		$preco = $_POST['preco'];
		$data_aquisicao = $_POST['data_aquisicao'];

		require_once("./controller/Veiculo.controller.class.php");
		$controller = new Veiculo;
		$controller->cadastraItens("proc_INSERE_VEICULO '$marca', '$modelo', '$placa', '$ano', '$km_inicial', '$preco', '$data_aquisicao'");
}
	// CONSULTA VEICULOS - SELECT
	if($_POST['read'] == 1 && $_POST['controller'] == 'Veiculo'){

		require_once("./controller/Veiculo.controller.class.php");
		$controller = new Veiculo;
		$controller->listaItens("proc_CONSULTA_VEICULO ");
	}  
	// CONSULTA VEICULOS - TABLE
	if($_POST['read'] == 2 && $_POST['controller'] == 'Veiculo'){

		$id = $_POST['id'];

		require_once("./controller/Veiculo.controller.class.php");
		$controller = new Veiculo;
		$controller->listaItens("proc_CONSULTA_VEICULO_ID '$id'");
		
	}  

	if($_POST['update'] == 1 && $_POST['controller'] == 'Veiculo'){

		$ID = $_POST['ID'];
		$marca = $_POST['marca']; 
		$modelo = $_POST['modelo'];
		$placa = $_POST['placa'];
		$ano = $_POST['ano'];
		$km_inicial = $_POST['km_inicial']; 
		$km_atual = $_POST['km_atual']; 
		$preco = $_POST['preco'];
		$data_aquisicao = $_POST['data_aquisicao'];
		$ativo = $_POST['ativo'];

		require_once("./controller/Veiculo.controller.class.php");
		$controller = new Veiculo;
		$controller->cadastraItens("proc_ALTERA_VEICULO $ID, '$marca', '$modelo', '$placa', '$ano', '$km_inicial', '$km_atual', '$preco', '$data_aquisicao', '$ativo'");
	}

	// CONSULTA FUNCIONÁRIOS - DATATABLE
	if($_POST['read'] == 3 && $_POST['controller'] == 'Veiculo'){


		require_once("./controller/Veiculo.controller.class.php");
		$controller = new Veiculo;
		$controller->listaItens("proc_CONSULTA_VEICULO_INATIVO");
	}  

	// ATUALIZA FUNCIONÁRIO 
	if($_POST['update'] == 2 && $_POST['controller'] == 'Veiculo'){

		$ID = $_POST['ID']; 
		$ativo = $_POST['ativo'];

		require_once("./controller/Veiculo.controller.class.php");
		$controller = new Veiculo;
		$controller->listaItens("proc_ALTERA_VEICULO_INATIVO $ID, '$ativo'");
		
	}  

	if($_POST['insert'] == 1 && $_POST['controller'] == 'Aluguel'){

		$ID_Cliente = $_POST['ID_Cliente']; 
		$ID_Veiculo = $_POST['ID_Veiculo'];
		$Dias = $_POST['Dias'];
		$Data_Aluguel = $_POST['Data_Aluguel'];
		$Data_Entrega = $_POST['Data_Entrega']; 
		$Preco = $_POST['Preco']; 
		$Pagamento = $_POST['Pagamento'];
		$Usuario = $_POST['Usuario'];

		require_once("./controller/Aluguel.controller.class.php");
		$controller = new Aluguel;
		$controller->cadastraItens("proc_INSERE_ALUGUEL $ID_Cliente, $ID_Veiculo, $Dias, '$Data_Aluguel',
		'$Data_Entrega', '$Preco', '$Pagamento', '$Usuario'");
	}

	// CONSULTA FUNCIONÁRIOS - DATATABLE
	if($_POST['read'] == 1 && $_POST['controller'] == 'Aluguel'){


		require_once("./controller/Aluguel.controller.class.php");
		$controller = new Aluguel;
		$controller->listaItens("proc_CONSULTA_ALUGUEL");
	} 

	if($_POST['read'] == 2 && $_POST['controller'] == 'Aluguel'){

		$ID = $_POST['ID'];
		require_once("./controller/Aluguel.controller.class.php");
		$controller = new Aluguel;
		$controller->listaItens("proc_CONSULTA_ALUGUEL_ID $ID");
	} 
	
	if($_POST['update'] == 1 && $_POST['controller'] == 'Aluguel'){

		$ID = $_POST['ID'];
		$Dias = $_POST['Dias'];
		$Dias_Atraso = $_POST['Dias_Atraso'];
		$Preco = $_POST['Preco']; 
		$Data_Aluguel = $_POST['Data_Aluguel'];
		$Data_Entrega = $_POST['Data_Entrega']; 
		$KM_Entrega = $_POST['KM_Entrega']; 
		$Pagamento = $_POST['Pagamento'];
		$Finalizado = $_POST['Finalizado'];

        require_once("./controller/Aluguel.controller.class.php");
        $controller = new Aluguel;
        $controller->listaItens("proc_FINALIZA_ALUGUEL '$ID', '$Dias', '$Dias_Atraso', '$Preco', '$Data_Aluguel', 
        '$Data_Entrega', '$KM_Entrega', '$Pagamento', '$Finalizado'");
	}

    if($_POST['update'] == 2 && $_POST['controller'] == 'Aluguel'){

        $ID = $_POST['ID'];

        require_once("./controller/Aluguel.controller.class.php");
        $controller = new Aluguel;
        $controller->listaItens("proc_CANCELAR_ALUGUEL '$ID'");
    }

    if($_POST['read'] == 1 && $_POST['controller'] == 'AluguelCancelado'){

        require_once("./controller/Aluguel.controller.class.php");
        $controller = new Aluguel;
        $controller->listaItens("proc_CONSULTA_ALUGUEL_CANCELADO");
    }

    if($_POST['read'] == 1 && $_POST['controller'] == 'Relatorio'){
        $ID = $_POST['ID'];

        require_once("./controller/Aluguel.controller.class.php");
        $controller = new Aluguel;
        $controller->listaItens("proc_CONSULTA_HISTORICO_VEICULO_ID $ID");
    }

    if($_POST['read'] == 2 && $_POST['controller'] == 'Relatorio'){
        $ID = $_POST['ID'];

        require_once("./controller/Aluguel.controller.class.php");
        $controller = new Aluguel;
        $controller->listaItens("proc_CONSULTA_HISTORICO_CLIENTE_ID $ID");
    }
}


  