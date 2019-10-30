<?php
    // $filename = $_POST['filename'];
	session_start();
	$filename = $_SESSION['emailUsuarioLogado'].'.png';
    $img = $_POST['pngimageData'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    unlink('assets/images/users/'.$filename);

    file_put_contents("assets/images/users/$filename", $data);
    echo 1;
?>