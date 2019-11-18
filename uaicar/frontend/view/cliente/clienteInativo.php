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
                    <h4 class="card-title ml-3 mt-3">Clientes Inativos</h4>
                    <div id="tabelaVeiculos"></div>
         
                  
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
<?php require '../include/footer.view.php'?>

<!-- ================================================================================== -->
<!-- SCRIPTS INDIVIDUAIS - QUE SÃO UTILIZADOS APENAS NESSA PÁGINA, SÃO INSERIDOS ABAIXO -->

<!-- Script que contém os JS de Cadastro Cliente -->
<script src="veiculoInativo.js"></script>
<!-- ================================================================================= -->   
<script>
    


</script>

</body>

</html>

