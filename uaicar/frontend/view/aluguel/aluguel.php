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
                    <h4 class="card-title ml-3 mt-3">Cadastro de Aluguel</h4>
                    <button class="btn btn-info ml-3" data-toggle="modal" data-target=".bd-example-modal-md" type="button"><i class="fas fa-plus-circle"></i> Adicionar Aluguel</button>
                    <div id="tabelaAluguel"></div>

                    <!-- INÍCIO MODAL DE CADASTRO -->
                    <div id="modal-cadastra-Aluguel" class="modal fade bd-example-modal-md" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                <h4 class="card-title border-bottom border-secondary pb-2">Cadastro de Aluguel</h4>

                                                    <form id="cadastra_cliente" method="post"  enctype="multipart/form-data" class="form-material m-t-40">

                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label>Cliente:</label>
                                                                    <select id="id_cliente" name="id_cliente" class="select2 select2-material">
                                                                        <option value="#" selected disabled>Selecione o Cliente...</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                <label>Veículo:</label>
                                                                    <select id="id_veiculo" name="id_veiculo" class="select2 select2-material">
                                                                        <option value="#" selected disabled>Selecione o Veículo...</option>
                                                                    </select>
                                                                </div>
                                                            </div>    
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Dias:</label>
                                                                    <input id="id_dias" name="id_dias" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                        </div>    
                                                        <div class="row">    
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Data Aluguel:</label>
                                                                    <input id="id_data_aluguel" name="id_data_aluguel" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Data Entrega:</label>
                                                                    <input id="id_data_entrega" name="id_data_entrega" type="text" class="form-control form-control-line" disabled> 
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Preço:</label>
                                                                    <input id="id_preco" name="id_preco" type="text" class="form-control form-control-line" disabled> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Pagamento:</label>
                                                                    <select id="id_pagamento" name="id_pagamento" class="select2 select2-material">
                                                                        <option value="#" selected disabled>Pagamento...</option>
                                                                        <option value="Pago">Pago</option>
                                                                        <option value="Pendente">Pendente</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row ml-1">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input id="btn_Cadastra_Aluguel"  type="submit" class="btn btn-info btn-lg btn-block" value="Cadastrar">
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

<script src="Aluguel.js"></script>
<!-- ================================================================================= -->   


</script>

</body>

</html>

