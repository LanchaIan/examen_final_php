<?php

$fileUploadDir = "/usr/local/var/www/dsw/ficheros/";
echo "<pre>";
print_r($_FILES);
echo "</pre>";

if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $fileUploadDir.$_FILES["fichero"]["name"])) {
    echo "El fichero ". $_FILES["fichero"]["name"] . " se ha subido correctamente.";
  } else {
    echo "Ha ocurrido un error al subir el fichero";
  }
?>

