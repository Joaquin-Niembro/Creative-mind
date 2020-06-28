<?php
    session_start();
    $varsession=$_SESSION['user'];

    if($varsession == null || $varsession = ''){
        echo 'No hay autorización';
        
        die();
    }
?>