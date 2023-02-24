<style>
    table{
        border-style: solid;
    }

    td{
        border-style: solid;
        text-align: center;
    }

</style>

<?php
session_start();

if (!isset($_SESSION["Nombre"])){
    header("Location: login.php");
    echo "<h3>Sesión no iniciada</h3>";
}

// PDO

$host = "localhost";
$db = "proyecto";
$user = "ian";
$pass = "1234";
$dsn = "mysql:host=$host;dbname=$db;";
// $dsn = "pgsql:host=$host;dbname=$db;";

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

try {
    $conProyecto = new PDO($dsn, $user, $pass);
    echo "<h1>Manejo del proyecto</h1>";
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}

if (isset($_SESSION["Nombre"])){
    cambiar_style();
    echo "<h2>Sesion iniciada</h2>";  
    poner_nombre();
    echo"<form action='perfil.php' method='post'>";
    echo"<input type='submit' name='perfil' value='Modificar perfil'/>";
    echo"</form>";  
}

$result = $conProyecto->query(
"SELECT productos.id, 
        productos.nombre,
        productos.nombre_corto,
        productos.descripcion,
        productos.pvp,
        productos.familia
 FROM 
        productos
WHERE
        id = $id");


$resultado = $result->fetch(PDO::FETCH_OBJ);


echo "<table class='default'>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nombre</th>";
            echo "<th>Nombre_corto</th>";
            echo "<th>Descripción</th>";
            echo "<th>pvp</th>";
            echo "<th>familia</th>";
        echo "</tr>";

while ($resultado != null) {
        echo "<tr>";
            echo "<td>$resultado->id</td>";
            echo "<td>$resultado->nombre</td>";
            echo "<td>$resultado->nombre_corto</td>";
            echo "<td>$resultado->descripcion</td>";
            echo "<td>$resultado->pvp</td>";
            echo "<td>$resultado->familia</td>";
        echo "</tr>";
    echo "</table";

    $resultado = $result->fetch(PDO::FETCH_OBJ);
}

function cambiar_style(){
    global $conProyecto;
    $nombre = $_SESSION['Nombre'];
    $resulta = $conProyecto->query(
    "SELECT usuarios_pagina.usuario,
            usuarios_pagina.colorfondo, 
            usuarios_pagina.tipoletra
    FROM 
            usuarios_pagina");

    $resultado_usuarios = $resulta->fetch(PDO::FETCH_OBJ);
        
    while ($resultado_usuarios != null){
        $usuario = $resultado_usuarios->usuario;
        if ($usuario == $nombre){
            $color_fondo = $resultado_usuarios->colorfondo;
            $tipo_letra = $resultado_usuarios->tipoletra;
            echo "<body style='font-family: Georgia; background-color:#$color_fondo';>"; 
        }
        $resultado_usuarios = $resulta->fetch(PDO::FETCH_OBJ);
    }    
}

function poner_nombre(){
    global $conProyecto;
    $nombre = $_SESSION['Nombre'];
    $resulta = $conProyecto->query(
    "SELECT usuarios_pagina.usuario,
            usuarios_pagina.nombrecompleto 
    FROM 
            usuarios_pagina");

    $resultado_usuarios = $resulta->fetch(PDO::FETCH_OBJ);
        
    while ($resultado_usuarios != null){
        $usuario = $resultado_usuarios->usuario;
        if ($usuario == $nombre){
            echo "<h3> Buenas $resultado_usuarios->nombrecompleto</h3>"; 
        }
        $resultado_usuarios = $resulta->fetch(PDO::FETCH_OBJ);
    }    
}


$conProyecto = null;
?>

<html>
    <form action="listado.php" method="post">
        <input type='submit' name='boton' value='Volver'/>
    </form>
<html>
