<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>UaiCar</title>
    <!-- Bootstrap Core CSS -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../../css/colors/blue.css" id="theme" rel="stylesheet">
     <!-- toast CSS -->
    <link href="../../assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../../assets/images/background/fundo-index.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="login_sistema">

                        <h3 class="box-title m-b-20 text-center font-weight-bold"><img src="../../assets/images/logo.png" style="width:30%; heigth:30%;"></h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" name="username" id="username" placeholder="Email"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" name="password" id="password" placeholder="Senha"> </div>
                        </div>
                        <div class="form-group">
                            <div class="d-flex no-block align-items-center">                                 
                                <div class="ml-auto">
                                    <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fa fa-lock m-r-5"></i> Esqueceu a Senha?</a> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button id="btn_login_sistema" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="submit" type="submit">Entrar</button>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.php">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Email"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/plugins/popper/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../../js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="../../assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="../../js/toastr.js"></script>
    <script src="../../js/toastr_alertas.js"></script>

    <script>
    //################# LOGIN ######################
    $('#btn_login_sistema').click(function(){

        event.preventDefault();

        //Verifica se o campo usuário foi inserido
        if($("#username").val() == ''){
            alertaRetorno('Login', 'Erro, digite o email!','error',3000,false);
            return false;
        }


        //Verifica se o campo senha foi inserido
        if($("#password").val() == ''){
            alertaRetorno('Login', 'Erro, digite a senha!','error',3000,false);
            return false;
        }


        //Início da requisição Ajax para validar usuário e senha
        $.ajax({

         
                method: "post",
                url: "../../../backend/controller/Controller.login.sistema.php",
                data: $('#login_sistema').serialize(),
                success: function(data) {
                                       
                    let obj = JSON.parse(data);
                   
                    
                    if(obj[0]['ID'] == '1'){
                        alertaRetorno('Login', 'Login efetuado com sucesso!', 'success',2000,false);
                        setTimeout(function(){ window.location = '../profile/index.php' }, 2000);
                    } else {
                        alertaRetorno('Login', ''+obj[0].RET_LOG+'','error',3000,false);
                    }
                    
                },
                error: function() {
                    //Resultado se houver falha
                    alertaRetorno('Login', 'Erro. Tente novamente.','error',3000,false);
                }
        });

    });
    //############### FIM LOGIN ####################
    </script>

    
</body>

</html>