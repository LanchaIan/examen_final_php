<?php

$validado = "false";
$host = "localhost";
$db = "proyecto";
$user = "ian";
$pass = "1234";
$dsn = "mysql:host=$host;dbname=$db;";
// $dsn = "pgsql:host=$host;dbname=$db;";

try {
    $conProyecto = new PDO($dsn, $user, $pass);
    echo "Bien pillado";
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
$result = $conProyecto->query(
    "SELECT usuarios.usuario, 
            usuarios.pass
     FROM 
            usuarios");
    
    
    $resultado = $result->fetch(PDO::FETCH_OBJ);
function iniciar_sesion(){
    session_start();
    $_SESSION["Nombre"] = $_POST["Nombre"];
}
function comprobar(){
    global $resultado;
    global $validado;
    global $result;

    while ($resultado != null) {
        $usuario = $resultado->usuario;
        $contraseña = $resultado->pass;

        if ($usuario == $_POST["Nombre"] || $contraseña == $_POST["contra"]){
            $validado = "true";
        }

        $resultado = $result->fetch(PDO::FETCH_OBJ);
    }

    if ($validado == "false"){
        unset($_POST["Nombre"]);
        unset($_POST["contra"]);
    }
}

if (isset($_SESSION["Nombre"])){
    $validado = "true";
}

if (isset($_POST["Nombre"])){
    iniciar_sesion();
    comprobar();
}
if ($validado == "true"){
    echo "<p>Hola {$_POST['Nombre']}.</p>";
    echo "<p>Introdujo {$_POST['contra']} como su contraseña.</p>";
    echo "<p>has iniciado sesión.</p>";
}
?>

<html>
    <body>
        <form method='post'>
            <label for="cod">Usuario:</label><br>
            <input type="text" id="Nombre" name="Nombre"><br>
            <label for="contra">Contraseña:</label><br>
            <input type="text" id="contra" name="contra"><br>
            <input type="submit" name="Enviar" value="Enviar"/>
        </form>
        <a href="pagina_privada.php">Enviar a pagina de usuarios
    </body>
</html>