<?php 
include '../include/controle_sessao.php';

$nome_usuario           = $_SESSION['nomeUsuarioLogado'];              
$matricula_colaborador  = $_SESSION['matriculaColaborador'];               
$id_tbl_acessos         = $_SESSION['idUsuarioAcessos'];
$valida_ldap            = $_SESSION['ldap']; 

?>

<?php require '../include/header.view.php'?>
<!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12 p-0 m-0">
            <div class="card p-0 m-0">
                <div class="card-body">
                    
                </div>
            </div>
        </div>    
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
<?php require '../include/footer.view.php'?>

<!-- ================================================================================== -->
<!-- SCRIPTS INDIVIDUAIS - QUE SÃO UTILIZADOS APENAS NESSA PÁGINA, SÃO INSERIDOS ABAIXO -->
<!-- ================================================================================= -->   
<script>
    


</script>

</body>

</html>