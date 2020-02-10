<?php
session_start();
$id = $_GET['id'];
$consulta = "SELECT imagen FROM noticia WHERE id=$id ORDER BY likes DESC";

header("Content-type: image/gif");
require_once "biblioteca.php";
$db = conectaDB();



$result = $db->query($consulta);

if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
}else{
    $row1 = $result->fetch(PDO::FETCH_ASSOC);
    print $row1["imagen"];
}
$db = null;
?>