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
                    <h4 class="card-title ml-3 mt-3">Cadastro de Cliente</h4>
                    <button class="btn btn-info ml-3" data-toggle="modal" data-target=".bd-example-modal-md" type="button"><i class="fas fa-plus-circle"></i> Adicionar Cliente</button>
                    <h4 class="card-title ml-3 mt-3">Buscar Cliente</h4>
                    <div class="ml-3">
                        <select id="id_cliente" name="id_cliente" class="select2 select2-material">
                        </select>
                    </div>                  
                    <div id="tabelaCliente" class="d-none" value="">
                        <div class="mt-3 ml-3"> 
                            <h4 class="card-title border-secondary pb-2">Dados do Cliente</h4>
                        </div>
                        <form id="dados_cliente" method="post"  enctype="multipart/form-data" class="form-material">
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Nome:</label>
                                    <input id="nome_cliente" name="nome_cliente" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Email:</label>
                                    <input id="email_cliente" name="email_cliente" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >RG:</label>
                                    <input id="rg_cliente" name="rg_cliente" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >CNH:</label>
                                    <input id="cnh_cliente" name="cnh_cliente" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Data de Nascimento:</label>
                                    <input id="nascimento_cliente" name="nascimento_cliente" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2 " >Estado:</label>
                                    <input id="estado_cliente" name="estado_cliente" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Cidade:</label>
                                    <input id="cidade_cliente" name="cidade_cliente" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>   
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2" >Endereço:</label>
                                    <input id="endereco_cliente" name="endereco_cliente" type="text" value="" class="form-control form-control-line p-0 text-center col-8">
                                </div>
                            </div>
                            <div class="row d-none">
                                <div class="form-group ml-3 col-12">
                                    <label class="col-2 " >Ativo:</label>
                                    <select id="ativo_cliente" name="status_" class="form-control p-0 text-center col-8">
 
                                    </select>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="form-group ml-3 col-12">
                                    <input id="btn_Atualiza_Cliente"  class="btn btn-info btn-lg btn-block" value="Atualizar Cliente">
                                </div>
                            </div>   
                        </form>  
                    </div>
                    
                    <!-- INÍCIO MODAL DE CADASTRO -->
                    <div id="modal-cadastra-cliente" class="modal fade bd-example-modal-md" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                <h4 class="card-title border-bottom border-secondary pb-2">Cadastro de Cliente</h4>

                                                    <form id="cadastra_cliente" method="post"  enctype="multipart/form-data" class="form-material m-t-40">

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Nome:</label>
                                                                    <input id="nome" name="nome" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input id="email" name="email" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>RG:</label>
                                                                    <input id="rg" name="rg" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>CNH:</label>
                                                                    <input id="cnh" name="cnh" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Nascimento:</label>
                                                                    <input id="nascimento" name="nascimento" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Estado:</label>
                                                                    <input id="estado" name="estado" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Cidade:</label>
                                                                    <input id="cidade" name="cidade" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Endereco:</label>
                                                                    <input id="endereco" name="endereco" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input id="btn_Cadastra_Cliente"  type="submit" class="btn btn-info btn-lg btn-block" value="Cadastrar">
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
<script src="Cliente.js"></script>
<!-- ================================================================================= -->   
<script>
    


</script>

</body>

</html>

