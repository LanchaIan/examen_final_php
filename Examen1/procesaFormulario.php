<?php
    $texto = @fopen("notas.txt", "a");
    $dni = $_POST["dni"];
    $modulo = $_POST["Modulo"];
    $nota = $_POST["nota"];
    $codigo = $_POST["codigo"];
    if (isset($_POST['genero'])){
        echo $_POST['genero']; // Muestra el CheckBox marcado.
        }
    $comentarios = "";
    $comentarios = $_POST["comentarios"];
    fwrite($texto,'"');
    fwrite($texto,$dni);
    fwrite($texto,'";');
    fwrite($texto,'"');
    fwrite($texto,$modulo);
    fwrite($texto,'";');
    fwrite($texto,'"');
    fwrite($texto,$nota);
    fwrite($texto,'";');
    fwrite($texto,'"');
    fwrite($texto,"$codigo,$comentarios");
    fwrite($texto,'"; \n');
?>