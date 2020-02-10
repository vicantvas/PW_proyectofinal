<?php
session_start();
if(isset($_SESSION["yavoto"])){
    unset($_SESSION["yavoto"]);
}

    $seccion=" ";
if(isset($_SESSION["bloque"])){
    if($_SESSION["bloque"]!=""){
        $seccion=" WHERE bloque='".$_SESSION["bloque"]."' ";
    }
}else{
    $seccion=" ";
}
require_once "biblioteca.php";
$db = conectaDB();
$consulta = "SELECT titulo,id FROM noticia".$seccion."ORDER BY likes DESC";
$result = $db->query($consulta);

if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
}else{
    $row1 = $result->fetch(PDO::FETCH_ASSOC);
    $row2 = $result->fetch(PDO::FETCH_ASSOC);
    $row3 = $result->fetch(PDO::FETCH_ASSOC);
    $row4 = $result->fetch(PDO::FETCH_ASSOC);
    $row5 = $result->fetch(PDO::FETCH_ASSOC);
    $row6 = $result->fetch(PDO::FETCH_ASSOC);
    $row7 = $result->fetch(PDO::FETCH_ASSOC);
    $row8 = $result->fetch(PDO::FETCH_ASSOC);
    $row9 = $result->fetch(PDO::FETCH_ASSOC);
    $ides1=$row1["id"];
    $ides2=$row2["id"];
    $ides3=$row3["id"];
    $ides4=$row4["id"];
    $ides5=$row5["id"];
    $ides6=$row6["id"];
    $ides7=$row7["id"];
    $ides8=$row8["id"];
    $ides9=$row9["id"];
    $boom1="noticia.php?id=$ides1";
    $boom2="noticia.php?id=$ides2";
    $boom3="noticia.php?id=$ides3";
    $boom4="noticia.php?id=$ides4";
    $boom5="noticia.php?id=$ides5";
    $boom6="noticia.php?id=$ides6";
    $boom7="noticia.php?id=$ides7";
    $boom8="noticia.php?id=$ides8";
    $boom9="noticia.php?id=$ides9";
    $bom1="blob.php?id=$ides1";
    $bom2="blob.php?id=$ides2";
    $bom3="blob.php?id=$ides3";
    $bom4="blob.php?id=$ides4";
    $bom5="blob.php?id=$ides5";
    $bom6="blob.php?id=$ides6";
    $bom7="blob.php?id=$ides7";
    $bom8="blob.php?id=$ides8";
    $bom9="blob.php?id=$ides9";
}
$consulta2 = "SELECT id,titulo, fechahora FROM noticia ORDER BY fechahora DESC";
$result2 = $db->query($consulta2);
if (!$result2) {
    print "    <p>Error en la consulta.</p>\n";
}else{
    $r1 = $result2->fetch(PDO::FETCH_ASSOC);
    $r2 = $result2->fetch(PDO::FETCH_ASSOC);
    $r3 = $result2->fetch(PDO::FETCH_ASSOC);
    $r4 = $result2->fetch(PDO::FETCH_ASSOC);
    $r5 = $result2->fetch(PDO::FETCH_ASSOC);
    $r6 = $result2->fetch(PDO::FETCH_ASSOC);
    $idesx1=$r1["id"];
    $idesx2=$r2["id"];
    $idesx3=$r3["id"];
    $idesx4=$r4["id"];
    $idesx5=$r5["id"];
    $idesx6=$r6["id"];
    $boomx1="noticia.php?id=$idesx1";
    $boomx2="noticia.php?id=$idesx2";
    $boomx3="noticia.php?id=$idesx3";
    $boomx4="noticia.php?id=$idesx4";
    $boomx5="noticia.php?id=$idesx5";
    $boomx6="noticia.php?id=$ides6";
}
$db = null;
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
  <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet"> 
    <link rel='stylesheet' href='nvic.css'/>
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet"> 
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
    <div class="contenido">
        <div class="destacadas">
            <h1>Destacadas</h1><hr>
            
            
            
            
<div class="galeria">          
<div class="row">
  <div class="col11">
    <div class="thumbnail">
      <a href="<?php print $boom1; ?>">
        <img src="<?php print $bom1; ?>" alt="Empty" style="height:250px;">
        <div class="caption caption1">
          <p><?php print $row1["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col1">
    <div class="thumbnail">
      <a href="<?php print $boom2; ?>">
        <img src='<?php print $bom2; ?>' alt='Empty' style="height:250px;">
        <div class="caption">
          <p><?php print $row2["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>
  <div class="col1">
    <div class="thumbnail">
      <a href="<?php print $boom3; ?>">
        <img src="<?php print $bom3; ?>" alt="Empty" style="height:250px;">
        <div class="caption">
          <p><?php print $row3["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col1">
    <div class="thumbnail">
      <a href="<?php print $boom4; ?>">
        <img src="<?php print $bom4; ?>" alt="Empty" style="height:250px;">
        <div class="caption">
          <p><?php print $row4["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>
  <div class="col1">
    <div class="thumbnail">
      <a href="<?php print $boom5; ?>">
        <img src="<?php print $bom5; ?>" alt="Empty" style="height:250px;">
        <div class="caption">
          <p><?php print $row5["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col1">
    <div class="thumbnail">
      <a href="<?php print $boom6; ?>">
        <img src="<?php print $bom6; ?>" alt="Empty" style="height:250px;">
        <div class="caption">
          <p><?php print $row6["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>

  <div class="col1">
    <div class="thumbnail">
      <a href="<?php print $boom7; ?>">
        <img src="<?php print $bom7; ?>" alt="Empty" style="height:250px;">
        <div class="caption">
          <p><?php print $row7["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col1">
    <div class="thumbnail">
      <a href="<?php print $boom8; ?>">
        <img src="<?php print $bom8; ?>" alt="Empty" style="height:250px;">
        <div class="caption">
          <p><?php print $row8["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>
  <div class="col1">
    <div class="thumbnail">
      <a href="<?php print $boom9; ?>">
        <img src="<?php print $bom9; ?>" alt="Empty" style="height:250px;">
        <div class="caption">
          <p><?php print $row9["titulo"];?></p>
        </div>
      </a>
    </div>
  </div>
</div>
</div>

        </div>
        <div class="recientes">
            <h1>Recientes<hr></h1>
            <ul class="list-group">
                <li class="list-group-item"><a class="fontfecha" href="<?php print $boomx1; ?>"><?php print $r1["fechahora"]."<br><h4 class='fontrecientes' >".$r1["titulo"]."</h4>";?></a></li>
                <li class="list-group-item"><a class="fontfecha" href="<?php print $boomx2; ?>"><?php print $r2["fechahora"]."<br><h4 class='fontrecientes' >".$r2["titulo"]."</h4>";?></a></li>
                <li class="list-group-item"><a class="fontfecha" href="<?php print $boomx3; ?>"><?php print $r3["fechahora"]."<br><h4 class='fontrecientes' >".$r3["titulo"]."</h4>";?></a></li>
                <li class="list-group-item"><a class="fontfecha" href="<?php print $boomx4; ?>"><?php print $r4["fechahora"]."<br><h4 class='fontrecientes' >".$r4["titulo"]."</h4>";?></a></li>
                <li class="list-group-item"><a class="fontfecha" href="<?php print $boomx5; ?>"><?php print $r5["fechahora"]."<br><h4 class='fontrecientes' >".$r5["titulo"]."</h4>";?></a></li>
                <li class="list-group-item"><a class="fontfecha" href="<?php print $boomx6; ?>"><?php print $r6["fechahora"]."<br><h4 class='fontrecientes' >".$r6["titulo"]."</h4>";?></a></li>
            </ul>
        </div>
    </div>
    <div class="pie">
        <p>UTM Breaking News&#174; es una marca registrada por Victor, inc. S.A. de C.V. y/o una de sus empresas filiales. Todos los derechos reservados.</p>
        <p>&#169;2020 Vasquez Tejada Victor Antonio. Huajuapan de León, Oaxaca.</p>
    </div>
</div>
</body>
</html>