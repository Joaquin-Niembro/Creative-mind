<?php
//incluir conexion
    include('conexion.php');

    if(isset($_POST['registrar'])){ //no cambie el nombre del post porque en el metodo no tiene nombre el submit pero hay que agregarselo
        $usuario=$_POST['usuario'];
        $contraseña=$_POST['contraseña'];
        session_start();
        $varsession=$_SESSION['user']=$usuario;
        $consulta="SELECT id, password FROM users WHERE name='$usuario'";
        $resultado=sqlsrv_query($con,$consulta);
        $filas=sqlsrv_num_rows($resultado);
        $row = $resultado->SQLSRV_FETCH_BOTH();
        
        $ver = password_verify($password,$row[1]);
        if($filas == 1 and $ver ==1){
            //a la pagina donde ya requiere sesion iniciada
            header("location:Forum.html");
        }else{
            $msg= "Check your inputs";
        }
        
        
       // mysqli_free_result($resultado);
        sqlsrv_free_stmt( $resultado);
        $con->close();
    }

?>