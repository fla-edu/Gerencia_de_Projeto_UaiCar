<?php 

session_start();

$nome_usuario = $_SESSION['nomeUsuarioLogado'];
$email = $_SESSION['email'];


?>

<?php require '../include/header.view.php'?>
<!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <span class="d-none" id="usuario"><?php echo $nome_usuario; ?></span>
    <div class="row">
        <div class="col-12 p-0 m-0">
            <div class="card p-0 m-0">
                <div class="card-body">
                    <h4 class="card-title ml-3 mt-3">Cadastro de Veículo</h4>
                    <button class="btn btn-info ml-3" data-toggle="modal" data-target=".bd-example-modal-md" type="button"><i class="fas fa-plus-circle"></i> Adicionar Veiculo</button>
                    <h4 class="card-title ml-3 mt-3">Buscar Veículo</h4>
                    <div class="ml-3">
                        <select id="id_veiculo" name="id_veiculo" class="select2 select2-material">
                            <option value="#" selected disabled>Selecione o Veículo...</option>
                        </select>  
                    </div>                  
                    <div id="tabelaVeiculo" class="d-none" value="">
                        <div class="mt-3 ml-3"> 
                            <h4 class="card-title border-secondary pb-2">Dados do Veículo</h4>
                        </div>
                        <form id="dados_veiculo" method="post"  enctype="multipart/form-data" class="form-material">
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Marca:</label>
                                    <input id="marca_veiculo" name="marca_veiculo" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Modelo:</label>
                                    <input id="modelo_veiculo" name="modelo_veiculo" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Placa:</label>
                                    <input id="placa_veiculo" name="placa_veiculo" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Ano:</label>
                                    <input id="ano_veiculo" name="ano_veiculo" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >KM Inicial:</label>
                                    <input id="km_inicial_veiculo" name="km_inicial_veiculo" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >KM Atual:</label>
                                    <input id="km_atual_veiculo" name="km_atual_veiculo" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2 " >Preço Diário:</label>
                                    <input id="preco_veiculo" name="preco_veiculo" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Data de Aquisicao:</label>
                                    <input id="data_aquisicao_veiculo" name="data_aquisicao_veiculo" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>   
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Ativo:</label>
                                    <select id="ativo_veiculo" name="ativo_veiculo" class="form-control p-0 text-center col-8">
 
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <input id="btn_atualiza_veiculo"  class="btn btn-info btn-lg btn-block" value="Atualizar Veículo">
                                </div>
                            </div>   
                        </form>  
                    </div>
                    
                    <!-- INÍCIO MODAL DE CADASTRO -->
                    <div id="modal-cadastra-veiculo" class="modal fade bd-example-modal-md" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-info sombra-btn-entrar pt-0 pb-0 pl-2 pr-2" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>    
                                                <h4 class="card-title border-bottom border-secondary pb-2">Cadastro de Veículo</h4>

                                                    <form id="cadastra_cliente" method="post"  enctype="multipart/form-data" class="form-material m-t-40">

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Marca:</label>
                                                                    <input id="marca" name="marca" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Modelo:</label>
                                                                    <input id="modelo" name="modelo" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Placa:</label>
                                                                    <input id="placa" name="placa" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Ano:</label>
                                                                    <input id="ano" name="ano" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>KM Inicial:</label>
                                                                    <input id="km_inicial" name="km_inicial" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Preço Diário:</label>
                                                                    <input id="preco" name="preco" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Data de Aquisição:</label>
                                                                    <input id="data_aquisicao" name="data_aquisicao" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-md-2 pl-2">
                                                                <div class="form-group">
                                                                    <label>Imagem:</label>
                                                                    <div class="upload-btn-wrapper">
                                                                        <input type="file" accept="image/png, image/jpeg, image/gif" id="input-file-events" name="input-file-events" />
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <input type="text" class="d-none form-control form-control-line" readonly id="nome-arquivo">
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input id="btn_Cadastra_Veiculo"  type="submit" class="btn btn-info btn-lg btn-block" value="Cadastrar">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
<?php require '../include/footer.view.php'?>

<!-- ================================================================================== -->
<!-- SCRIPTS INDIVIDUAIS - QUE SÃO UTILIZADOS APENAS NESSA PÁGINA, SÃO INSERIDOS ABAIXO -->

<!-- Script que contém os JS de Cadastro Cliente -->
<script src="Veiculo.js"></script>
<!-- ================================================================================= -->   
<script>
    


</script>

</body>

</html>

