<?php 
session_start();
if(array_key_exists("nombre",$_SESSION) ){
    header("location: nuevanoticia.html");
}
else{
    header("location: login.html");
}

?>