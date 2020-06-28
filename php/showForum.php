<?php 
 include('php/conexion.php');
        $sth=$con->query("select id,post,author,user from posts") ;
        foreach(($con->query("select id,post,author,user from posts")) as
        $fila){ ?>
        <div class="container" id="cont">
          <h1 id="title">
            Post:
            <?php echo $fila['id'];?>
            <br />
            <?php echo $fila['post'];?>
            <br />
            Author:
            <?php echo $fila['author'];?>
            <br />
            User:
            <?php echo $fila['user'];?>
            <br></br>
            <br></br>
            <button>Like</button>
          </h1>
          
        </div>
        <?php,?>
        <?php 
          }?>