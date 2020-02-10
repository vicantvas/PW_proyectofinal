<?php       
session_start();
require_once "biblioteca.php";
$db = conectaDB();
$db->setAttribute(PDO::MYSQL_ATTR_FOUND_ROWS, TRUE);



$id=$_GET['id'];
 $_SESSION["yavoto"]=1; 
$consulta = "UPDATE noticia SET likes = likes + 1 WHERE id = $id;";
$result = $db->query($consulta);
header("location: noticia.php?id=$id");
?>