<?php
    session_start();
    if (isset($_SESSION["Nombre"])){
        echo "Tienes la sesión iniciada ";
        print_r($_SESSION["Nombre"]);    
    }
    if (!isset($_SESSION["Nombre"])){
        echo "No has inicado sesión";
    }
?>
<html>
    <body>
        <form method='post'>
            <input type="submit" name="borrar" value="borrar sesion"/>
        </form>
    </body>
</html>
<?php
if (isset($_POST["borrar"])){
    borrar();  
}
function borrar(){
    if (isset($_SESSION["Nombre"])){
        session_destroy();
        echo "Borrada con éxito";  
    }
    if (!isset($_SESSION["Nombre"])){
        echo "No puedes borrar sesión si no la has iniciado";
    }
}
?>