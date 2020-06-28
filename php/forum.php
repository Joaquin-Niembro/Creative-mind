<?php
    $msg ="";
    include('php/conexion.php');
    if(isset($_POST['post'])){
        
        $post = $_POST['thought'];
        $author = $_POST['author'];
        $user = $_SESSION['user']; 
        
        $sql= "INSERT INTO posts (post,author,user)
        VALUES('$post','$author ','$user')";
        if (mysqli_query($con, $sql)) {
            
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($con);
     }

     if(isset($_POST['update'])){
        $id = $_POST['id'];
        $post = $_POST['thought'];
        $author = $_POST['author'];
        $user = $_SESSION['user']; 
        $consulta="SELECT post, author, user FROM posts WHERE id='$id'";
        $resultado=mysqli_query($con,$consulta);
        $filas=mysqli_num_rows($resultado);
        $row = $resultado->fetch_array(MYSQLI_BOTH);
        
        
        if($_SESSION['user'] == $row[2]){
            $sql= "UPDATE posts SET post = '$post', author= '$author'
            Where id = '$id'";
            if (mysqli_query($con, $sql)) {
                header("location:Forum.html");
                
            } else {
                $msg= "Error: Couldn´t update post" ;
            }
    
    mysqli_close($con);  
        }else{
            $msg= "Can´t update a post that isn´t yours";
        }
        
    }  
    
    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        
        $user = $_SESSION['user']; 
        $consulta="SELECT  user FROM posts WHERE id='$id'";
        $resultado=mysqli_query($con,$consulta);
        $filas=mysqli_num_rows($resultado);
        $row = $resultado->fetch_array(MYSQLI_BOTH);
        
        
        if($_SESSION['user'] == $row[0]){
            $sql= "DELETE FROM posts WHERE id='$id'";
            if (mysqli_query($con, $sql)) {
                header("location:Forum.html");
                
            } else {
                $msg= "Error: Couldn´t Delete post" ;
            }
    
    mysqli_close($con);  
        }else{
            $msg= "Can´t Delete a post that isn´t yours";
        }
        
    }  

?>