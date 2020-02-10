<?php       
session_start();
if(!array_key_exists("nombre",$_SESSION) ){
    print "No ha iniciado sesión";
    print "<meta http-equiv='Refresh' content='2; url=nuevanoticia.html' />";
}else{
    
require_once "biblioteca.php";
$db = conectaDB();
$db->setAttribute(PDO::MYSQL_ATTR_FOUND_ROWS, TRUE);

$titulo=$_REQUEST["titulo"];
$imagen="";
$fechahora="current_timestamp()";
$autor=$_SESSION["nombre"];
$contenido=$_REQUEST["contenido"];
$bloque=$_REQUEST["seccion"];

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0){ 
          $tmpName  = $_FILES['image']['tmp_name'];  
          $fp = fopen($tmpName, 'r');
          $data = fread($fp, filesize($tmpName));
          $data = addslashes($data);
          fclose($fp);
      } 
$consulta="INSERT INTO `noticia` (`id`, `likes`, `titulo`, `imagen`, `fechahora`, `autor`, `contenido`, `bloque`) VALUES (NULL, '0', '$titulo','$data', current_timestamp(), '$autor', '$contenido', '$bloque') ";
$db->query($consulta);
$id=$db->lastInsertId();
header("location: noticia.php?id=$id");
}
?>