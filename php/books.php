<?php
    $msg="";
    include('php/conexion.php');
    if(isset($_POST['book'])){
        
        $book = $_POST['books'];
        $author = $_POST['author'];
        $user = $_SESSION['user']; 
        
        $sql= "INSERT INTO books (book,author,user) VALUES('$book','$author','$user')";
        if (mysqli_query($con, $sql)) {
            header("location: Books.html");
            
        } else {
            $msg="No se pudo registrar el libro";
        }
        
        mysqli_close($con);
     }

     if(isset($_POST['update'])){
        $id = $_POST['id'];
        $book = $_POST['books'];
        $author = $_POST['author'];
        $user = $_SESSION['user']; 
        $consulta="SELECT book, author, user FROM books WHERE id='$id'";
        $resultado=mysqli_query($con,$consulta);
        $filas=mysqli_num_rows($resultado);
        $row = $resultado->fetch_array(MYSQLI_BOTH);
        
        
        if($_SESSION['user'] == $row[2]){
            $sql= "UPDATE books SET book = '$book', author= '$author'
            Where id = '$id'";
            if (mysqli_query($con, $sql)) {
                header("location:Books.html");
                $msg= "Book has been updated!" ;
            } else {
                $msg= "Error: Couldn´t update Book" ;
            }
    
    mysqli_close($con);  
        }else{
            $msg= "Can´t update a Book that isn´t yours";
        }
        
    } 

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        
        $user = $_SESSION['user']; 
        $consulta="SELECT  user FROM books WHERE id='$id'";
        $resultado=mysqli_query($con,$consulta);
        $filas=mysqli_num_rows($resultado);
        $row = $resultado->fetch_array(MYSQLI_BOTH);
        
        
        if($_SESSION['user'] == $row[0]){
            $sql= "DELETE FROM books WHERE id='$id'";
            if (mysqli_query($con, $sql)) {
                header("location:Books.html");
                
            } else {
                $msg= "Error: Couldn´t Delete book" ;
            }
    
    mysqli_close($con);  
        }else{
            $msg= "Can´t Delete a book that isn´t yours";
        }
        
    }  

?>