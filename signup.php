<?php       
session_start();
require_once "biblioteca.php";
$db = conectaDB();
$db->setAttribute(PDO::MYSQL_ATTR_FOUND_ROWS, TRUE);
$nombre=$_REQUEST["nombre"];
$mail=$_REQUEST["mail"];
$contras=md5($_REQUEST["pass"]);

$consulta="SELECT id FROM periodista WHERE correo='$mail'";
$result = $db->query($consulta);	

if ($result->rowCount()>0){
    header("location: signup.html");
}else{
    $consulta="INSERT INTO `periodista` (`id`, `nombre`, `correo`, `password`) VALUES (NULL, '$nombre', '$mail', '$contras') ";
    $result = $db->query($consulta);	
    header("location: login.html");
}
$db=NULL;
    session_unset(); 
	session_destroy();
?>