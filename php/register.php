<?php
include('conexion.php');

if(isset($_POST['registrar'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword']; 
    if($password != $cPassword){
        $msg = "Check your passwrods!";
    }else{
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $sql= "INSERT INTO users (name,email,password)
    VALUES('$name','$email ','$hash')";
    if (mysqli_query($con, $sql)) {
        $msg = "You have been Registered";
        
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($con);
 }
    }

    
?>
