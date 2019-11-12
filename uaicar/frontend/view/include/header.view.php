<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>UaiCar</title>
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logo.png">
    <!-- Bootstrap Core CSS -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Cropper CSS -->
    <link href="../../assets/plugins/cropper/cropper.min.css" rel="stylesheet">
    <!-- Loader CSS -->
    <link href="../../css/custom-dash.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../../css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../../assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Select 2 -->
    <link href="../../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- CSS Animate -->
    <link href="../../assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css" />
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="../../assets/plugins/datatables/datatables.min.css">
    <!-- Data Pikers -->
    <link href="../../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!--Sweet Alert -->
    <link href="../../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">


    <link href="../../css/estilo-select2-material.css" rel="stylesheet">

    <link href="../../assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />

    
    
    <style>        

        .img-circle{
            cursor: pointer;
        }

        .select2 {
            width:100%!important;
        }

        .table td{
            vertical-align: middle !important;
            text-align: center !important;
        }
            
        .table th{
            vertical-align: middle !important;
            text-align: center !important;   
        }          

    </style> 
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div id="bg-loader-submit" class="bg-loader bg-loader-hide">
        <div class="container-loader">
            <div class='loader1'>
                <div>
                    <div>
                    <div>
                        <div>
                            <div></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>                        
                        
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->                        
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/users/<?php echo $email; ?>.png" alt="user" class="profile-pic imageexists" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../../assets/images/users/<?php echo $email; ?>.png" alt="user" class="imageexists"></div>
                                            <div class="">
                                                <br>
                                                <h6><?php echo $nome_usuario ; ?></h6>
                                                <p class="text-muted"><?php echo $email; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.php"><i class="ti-user"></i> Meu Perfil</a></li>
                                    <li role="separator" class="divider"></li>                                    
                                    <li><a href="../../view/include/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        
                    </ul>
                </div>
            </nav>
        </header>
         <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url(../../assets/images/background/user-info1.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="../../assets/images/users/<?php echo $email; ?>.png" alt="user" class="imageexists"/> </div>
                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown font-weight-bold" style="color:white !important" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?php echo $nome_usuario ; ?></a>
                        <div class="dropdown-menu animated flipInY"> 
                            <a href="profile.php" class="dropdown-item"><i class="ti-user"></i> Meu Perfil</a>                             
                            <div class="dropdown-divider"></div>                             
                            <a href="../../view/include/logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a> </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- <li> <a href="../funcionario/funcionario.php" aria-expanded="false"><i class="mdi mdi-clipboard-account"></i><span class="hide-menu">Funcionários </span></a></li> -->
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-account"></i><span class="hide-menu">Funcionários</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../funcionario/funcionario.php">Cadastrar Funcionários</a></li>
                                <li><a href="../funcionario/funcionarioInativo.php">Funcionários Inativos</a></li>
                            </ul>                          
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Clientes</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../cliente/cliente.php">Cadastrar Clientes</a></li>
                                <li><a href="../cliente/clienteInativo.php">Clientes Inativos</a></li>
                            </ul>                          
                        </li> 
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-car"></i><span class="hide-menu">Veículos</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../veiculo/veiculo.php">Cadastrar Veículos</a></li>
                                <li><a href="../veiculo/veiculoInativo.php">Veículos Inativos</a></li>
                            </ul>                          
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cash"></i><span class="hide-menu">Alugueis</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="../aluguel/aluguel.php">Cadastrar Alugueis</a></li>
                                <li><a href="../aluguel/aluguelInativo.php">Alugueis Cancelados</a></li>
                            </ul>                          
                        </li>                        
                        
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Home</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Meu Perfil</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">                            
                            <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                
        