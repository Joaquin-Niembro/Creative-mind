<?php
    $admin="";
    include('php/conexion.php');
    if($_SESSION['user'] == "Admin"){
        $admin=" DB Report";
    }
?>