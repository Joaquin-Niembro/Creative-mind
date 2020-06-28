<?php
$host="127.0.0.1";
$port=3306;
$socket="";
$user="root";
$password="jack=OFF23";
$dbname="passwordhasshing";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
//if($con){
  //  echo "hola";
//}
/*$query = "select id,name,email,password from users";
if ($stmt = $con->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($id, $name, $email, $password);
    while ($stmt->fetch()) {
        echo"<table border='2'>
                <tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$$email</td>
                    <td>$password</td>
                </tr>
            </table>";
    }
    
    $stmt->close();
}*/
?>
