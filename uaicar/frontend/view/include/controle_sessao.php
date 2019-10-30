<?php 
    session_start();
    if ($_SESSION['nomeUsuarioLogado'] == null) {
        header('Location: ./');
    }
?>