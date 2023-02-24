<html>
    <body>
        <form action="formulario.php" method="post" enctype="multipart/form-data">
        <p>DNI del alumno: <input type="text" name="dni" /></p>
        <select name="Modulo" id="Modulo">
            <optgroup label="Modulo">
                <option value="DEW">DEW</option>
                <option value="DSW">DSW</option>
            </optgroup>
        </select>
        <p>Nota: <input type="text" name="nota" /></p>
        <p>Código organizado<input type="checkbox" name="codigo" value="codigo"/></p>
        <p>Incluye comentarios<input type="checkbox" name="comentarios" value="comentarios"/></p>
        <p>Estructura de control<input type="checkbox" name="estructura" value="estructura"/></p>
        <p><input type="file" name="fichero"></p>
        <p><input type="submit" /></p>
    </form>
    </body>
</html>

<?php
    if (isset($_POST['dni'])){
        $texto = @fopen("notas.txt", "w");
    $dni = $_POST["dni"];
    $nombres = array(
        "22222222W" => "Juan Luis",
        "11111111E" => "Walugi"
    );
    $nombre = "";
    if (isset($nombres[$dni])){
        $nombre = $nombres[$dni];
    };
    $modulo = $_POST["Modulo"];
    $nota = $_POST["nota"];

    if (isset($_POST['codigo'])){
        $codigo = $_POST["codigo"];
        };
    if (isset($_POST['comentarios'])){
        $comentarios = $_POST["comentarios"];
    };
    if (isset($_POST['estructura'])){
        $comentarios = $_POST["estructura"];
    };

    fwrite($texto,'DNI:"');
    fwrite($texto,$dni);
    fwrite($texto,'"
    ');
    fwrite($texto,'Nombre:"');
    fwrite($texto,$nombre);
    fwrite($texto,'"
    ');
    fwrite($texto,'Módulo:"');
    fwrite($texto,$modulo);
    fwrite($texto,'"
    ');
    fwrite($texto,'Nota:"');
    fwrite($texto,$nota);
    fwrite($texto,'"
    ');
    fwrite($texto,'"');
    if (isset($_POST['codigo'])){
        fwrite($texto,"$codigo");
        };
    if (isset($_POST['comentarios'])){
        fwrite($texto,"$comentarios");
    };
    if (isset($_POST['estructura'])){
        fwrite($texto,"$estructura");
    };
    fwrite($texto,'";');

    $fileUploadDir = "ficheros/";
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $fileUploadDir.$_FILES["fichero"]["name"])) {
        echo "El fichero ". $_FILES["fichero"]["name"] . " se ha subido correctamente.";
      } else {
        echo "Ha ocurrido un error al subir el fichero";
      };

    #header('Location: enviado.html');
        };
?>