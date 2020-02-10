<?php  
session_start();
require_once "biblioteca.php";
$db = conectaDB();
$db->setAttribute(PDO::MYSQL_ATTR_FOUND_ROWS, TRUE);
$comentario=$_REQUEST["comentario"];
$id=$_GET['id'];
$consulta="INSERT INTO `comentario` (`id`, `id_noticia`, `comentario`, `fechahora`) VALUES (NULL, '$id', '$comentario', current_timestamp())";
$result = $db->query($consulta);	
$idn=$_SESSION["quenoticia"];
header("location: noticia.php?id=$idn");

?>