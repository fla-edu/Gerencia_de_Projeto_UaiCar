<?php 
// require '../include/controle_sessao.php';
session_start();
$nome_usuario   = $_SESSION['nomeUsuarioLogado'];
$email = $_SESSION['email'];

?>


       <?php require '../include/header.view.php'?>
        <!-- ============================================================== -->

                <?php require '../include/footer.view.php'?>
               
    <!-- Image cropper JavaScript -->
    <script src="../../assets/plugins/cropper/cropper.min.js"></script>
    <script src="../../assets/plugins/cropper/cropper.init.js"></script>
    
    <script>
    $(document).ready(function(){
        $(".imageexists").each(function(){
          var $image = $(this);
          $.ajax($(this).attr("src")).done(function() {
            //alert($image);
          }).fail(function() { 
            $(".imageexists").attr('src','../../assets/images/users/avatar.png');
            $('.cropper-canvas').children('img').attr('src','../../assets/images/users/avatar.png');
          });
        });

    });











   





    </script>

    


</body>

</html>