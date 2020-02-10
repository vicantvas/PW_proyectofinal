<?php       
session_start();
require_once "biblioteca.php";
$db = conectaDB();
$db->setAttribute(PDO::MYSQL_ATTR_FOUND_ROWS, TRUE);
$mail=$_REQUEST["mail"];
$contras=md5($_REQUEST["pass"]);

$consulta="SELECT id,nombre FROM periodista WHERE correo='$mail' and password='$contras';";
$result = $db->query($consulta);	

if ($result->rowCount()>0){
    $rows = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION["nombre"]=$rows["nombre"];
    $_SESSION["id"]=$rows["id"];
    header("location: nuevanoticia.html");
}else{
    header("location: login.html");
}
?>