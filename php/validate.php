<?php
    $msg="";
    include('conexion.php');
    if(isset($_POST['registrar'])){
        $name=$_POST['email'];
        $password=$_POST['password'];
        session_start();
        $varsession=$_SESSION['user']=$name;
        $consulta="SELECT id, password FROM users WHERE name='$name'";
        $resultado=mysqli_query($con,$consulta);
        $filas=mysqli_num_rows($resultado);
        $row = $resultado->fetch_array(MYSQLI_BOTH);
        
        $ver = password_verify($password,$row[1]);
        if($filas == 1 and $ver ==1){
            
            header("location:Forum.html");
        }else{
            $msg= "Check your inputs";
        }
        
        
        mysqli_free_result($resultado);
        $con->close();
    }


    

?>