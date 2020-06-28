<?php
    $msg = "";
    include('php/conexion.php');
    if(isset($_POST['song'])){
        
        $song = $_POST['songs'];
        $author = $_POST['author'];
        $user = $_SESSION['user']; 
        
        $sql= "INSERT INTO songs (song,author,user) VALUES('$song','$author','$user')";
        if (mysqli_query($con, $sql)) {
            header("location: Songs.html");
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($con);
     }

     if(isset($_POST['update'])){
        $id = $_POST['id'];
        $song = $_POST['songs'];
        $author = $_POST['author'];
        $user = $_SESSION['user']; 
        $consulta="SELECT song, author, user FROM songs WHERE id='$id'";
        $resultado=mysqli_query($con,$consulta);
        $filas=mysqli_num_rows($resultado);
        $row = $resultado->fetch_array(MYSQLI_BOTH);
        
        
        if($_SESSION['user'] == $row[2]){
            $sql= "UPDATE songs SET song = '$song', author= '$author'
            Where id = '$id'";
            if (mysqli_query($con, $sql)) {
                header("location:Songs.html");
                $msg= "Song has been updated!" ;
            } else {
                $msg= "Error: Couldn´t update song" ;
            }
    
    mysqli_close($con);  
        }else{
            $msg= "Can´t update a song that isn´t yours";
        }
        
    } 
    
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        
        $user = $_SESSION['user']; 
        $consulta="SELECT  user FROM songs WHERE id='$id'";
        $resultado=mysqli_query($con,$consulta);
        $filas=mysqli_num_rows($resultado);
        $row = $resultado->fetch_array(MYSQLI_BOTH);
        
        
        if($_SESSION['user'] == $row[0]){
            $sql= "DELETE FROM songs WHERE id='$id'";
            if (mysqli_query($con, $sql)) {
                header("location:Songs.html");
                
            } else {
                $msg= "Error: Couldn´t Delete song" ;
            }
    
    mysqli_close($con);  
        }else{
            $msg= "Can´t Delete a song that isn´t yours";
        }
        
    }  
?>