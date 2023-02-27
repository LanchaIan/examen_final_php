<style>
    table{
        border-style: solid;
    }

    td{
        border-style: solid;
        text-align: center;
    }

    .texto{
        padding: 150px;
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
}

    $nombre = $_SESSION['Nombre'];
    $resulta = $conProyecto->query(
    "SELECT usuarios_pagina.usuario,
            usuarios_pagina.clave,
            usuarios_pagina.nombrecompleto,
            usuarios_pagina.correo,
            usuarios_pagina.colorfondo, 
            usuarios_pagina.tipoletra
    FROM 
            usuarios_pagina
    WHERE
            usuario = '$nombre'");

    $resultado_usuarios = $resulta->fetch(PDO::FETCH_OBJ);

?>
<html>
    <form method="post">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="Usuario" name="Usuario" value="<?php echo $resultado_usuarios->usuario;?>"><br>
        <label for="contraseña">Contraseña:</label><br>
        <input type="text" id="Contraseña" name="Contraseña" value="<?php echo $resultado_usuarios->clave;?>"><br>
        <label for="nom_com">Nombre completo:</label><br>
        <input type="text" id="nombrecompleto" name="nombrecompleto" value="<?php echo $resultado_usuarios->nombrecompleto;?>"><br>
        <label for="correo">correo:</label><br>
        <input type="text" id="correo" name="correo" value="<?php echo $resultado_usuarios->correo;?>"><br>
        <label for="colorfondo">Color de fondo:</label><br>
        <input type="text" id="colorfondo" name="colorfondo" value="<?php echo $resultado_usuarios->colorfondo;?>"><br>
        <label for="tipoletra">Tipo de letra:</label><br>
        <input type="text" id="tipoletra" name="tipoletra" value="<?php echo $resultado_usuarios->tipoletra;?>"><br>
        <input type='hidden' name='usuario_viejo' value="<?php echo $nombre;?>"/>
        <input type="submit" name="Enviar" value="Enviar"/>
    </form>
    <form action="listado.php" method="post">
        <input type='submit' name='boton' value='Volver'/>
    </form>
</html>
<?php
    function insertar(){
        global $conProyecto;
        global $id;
        global $nombre;
        $usuario = $_POST["Usuario"];
        $clave = $_POST["Contraseña"];
        $nombrecompleto = $_POST["nombrecompleto"];
        $correo = $_POST["correo"];
        $colorfondo = $_POST["colorfondo"];
        $tipoletra = $_POST["tipoletra"];

        $sql = $conProyecto->prepare("UPDATE usuarios_pagina
        SET
        usuario=:usuario, clave=:clave, nombrecompleto=:nombrecompleto, correo=:correo, colorfondo=:colorfondo, tipoletra=:tipoletra
        where
        usuario='$nombre'");
        $sql->bindParam(':usuario',$usuario);
        $sql->bindParam(':clave',$clave);
        $sql->bindParam(':nombrecompleto',$nombrecompleto);
        $sql->bindParam(':correo',$correo);
        $sql->bindParam(':colorfondo',$colorfondo);
        $sql->bindParam(':tipoletra',$tipoletra);
        $sql->execute();

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

    function borrar(){
        echo "<h2>pillado</h2>";  
        if (isset($_SESSION["Nombre"])){ 
            session_destroy();
            header("Location: login.php");
            echo "<h2>Editado con éxito</h2>";  
        }
    }
    

    if (isset($_POST['Enviar'])){
        insertar();
        borrar();
    }
    
    $conProyecto = null;
?>