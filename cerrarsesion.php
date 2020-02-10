<?php
    session_start();
    header("location: nvic.php");
    session_unset(); 
	session_destroy();
    
?>