<?php
session_start();

require_once "biblioteca.php";
$db = conectaDB();
$id=$_GET['id'];
$consulta = "SELECT autor, fechahora, titulo, contenido FROM noticia WHERE id=$id";

$result = $db->query($consulta);

if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
}else{  
    $row=$result->fetch(PDO::FETCH_ASSOC);
}
$consulta2 = "SELECT comentario FROM comentario WHERE id_noticia=$id";
$result2 = $db->query($consulta2);
$comentarios="";
if (!$result2) {
    print "    <p>Error en la consulta.</p>\n";
}else{  
    
    foreach ($result2 as $valor2) {
        $gigi=$valor2["comentario"];
        $comentarios=$comentarios."<div class='panel-body'>$gigi</div>";
    }
}
$consulta = "SELECT likes FROM noticia WHERE id=$id";

$result = $db->query($consulta);
$li=$result->fetch(PDO::FETCH_ASSOC);
$cuantoslikes=$li["likes"];

$db = null;
$_SESSION["quenoticia"]=$id;
$boom="blob.php?id=$id";
$boom2="registrarComentario.php?id=$id";
$boomlike="likes.php?id=$id";
$estadolike="active";
if(isset($_SESSION["yavoto"]))
    $estadolike="disabled";

?>
<!DOCTYPE html>
<html>
<head>
    <title>UTM Breaking News</title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='nvic.css'/>
    <script src="time.js"></script>
</head>
<body>
<div class="principal">
    <div class="encabezado">
        <div class="encabezado-contenido">
            <a href="todo.php" class="titulo" style="text-decoration:none;color:#fff;">
                <img class='imagen' src="logo.png" width="50" height="50"> 
                <h1>NVIC</h1>            
            </a>
            <div class="date">
                <div id="fecha"></div>  
                <div id="reloj"></div> 
            </div>
            <div class="globo">
                <span class="glyphicon glyphicon-globe"></span>
            </div>
        </div>
    </div>
    <nav class="menu navbar navbar-default">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href="todo.php">TODO</a></li>
          <li><a href="Deportes.php">DEPORTES</a></li>
          <li><a href="Politica.php">POLÍTICA</a></li>
          <li><a href="Cultura.php">CULTURA</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="logincheck.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </nav>
    <div class="contenido2 container">
 
        <div class="panel panel-default" style="margin-top:20px;border:none;"><p class="panel-body"><?php print $row["autor"]."   ".$row["fechahora"];?></p></div>
        <article class="noticia">
            <header>
                <h1><?php print $row["titulo"];?></h1>     
            </header>
            <img class="imagenNoticia" src=<?php print $boom;?> alt="Empty">
            <p style="margin-top:50px;"><?php print $row["contenido"];?></p>  
        </article>

<div class="comentarios container">
        <div class="like">
            <form action="<?php print $boomlike;?>" method="post">
 		        <div class="form-group">
                    <button type="submit" class="btn btn-info <?php print $estadolike;?>">Like</button>
 		         </div>
            </form> 
            <p>A <?php print $cuantoslikes; ?> personas les gusta esta noticia.</p>
        </div>
    <div class="panel panel-default">
        <div class="panel-heading">Comentarios</div>
            <form class="panel-body" action="<?php print $boom2;?>" method="post">
 		        <div class="form-group">
                    <textarea name="comentario" class="form-control" rows="3" id="comment" placeholder="Agregar un comentario"></textarea>
 		         </div>
                <button type="submit" class="btn btn-default">Publicar</button>
            </form> 
            <?php print $comentarios;?>
    </div>
</div>        

    </div>
    <div class="pie">
        <p>UTM Breaking News&#174; es una marca registrada por Victor, inc. S.A. de C.V. y/o una de sus empresas filiales. Todos los derechos reservados.</p>
        <p>&#169;2020 Vasquez Tejada Victor Antonio. Huajuapan de León, Oaxaca.</p>
    </div>
</div>
</body>
</html>