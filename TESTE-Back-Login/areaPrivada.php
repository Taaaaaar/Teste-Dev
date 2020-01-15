<?php
    session_start();
    if(!isset($_SESSION['id_usuarios'])){
        header("location: index.php");
        exit;
    }

?>

SEJA BEM VINDOOOOO!