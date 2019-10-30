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
                    <h4 class="card-title ml-3 mt-3">Cadastro de Funcionário</h4>
                    <button class="btn btn-info ml-3" data-toggle="modal" data-target=".bd-example-modal-md" type="button"><i class="fas fa-plus-circle"></i> Adicionar Funcionário</button>
                    <div id="tabelaFuncionario"></div>
                    
                    <!-- INÍCIO MODAL DE CADASTRO -->
                    <div id="modal-cadastra-funcionario" class="modal fade bd-example-modal-md" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
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
                                                <h4 class="card-title border-bottom border-secondary pb-2">Cadastro de Funcionário</h4>

                                                    <form id="cadastra_cliente" method="post"  enctype="multipart/form-data" class="form-material m-t-40">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Nome:</label>
                                                                    <input id="nome" name="nome" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Email:</label>
                                                                    <input id="email" name="email" type="text" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Senha:</label>
                                                                    <input id="senha" name="senha" type="password" class="form-control form-control-line"> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Tipo:</label>
                                                                    <select id="tipo" name="tipo" class="form-control form-control-line">
                                                                        <option value="Administrador">Administrador</option>
                                                                        <option value="Atendente">Atendente</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input id="btn_Cadastra_Funcionario"  type="submit" class="btn btn-info btn-lg btn-block" value="Cadastrar">
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
<script src="funcionario.js"></script>
<!-- ================================================================================= -->   
<script>
    


</script>

</body>

</html>

