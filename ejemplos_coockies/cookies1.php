<?php

$variable = "Hola";

// Obtenemos el número de visitas hasta ahora (sin contar la actual)
if (isset($_COOKIE["visita"]))
    $numeroVisitas = sizeof($_COOKIE["visita"]);
else
    $numeroVisitas = 0;

// Almacenamos en una cookie todos los instantes en los que el usuario se ha conectado a esta web
setcookie("visita[$numeroVisitas]", time(), time()+120);
setcookie("saludo", $variable, time() + 6000);

// setcookie("numeroVisitas", $numeroVisitas+1);

// Creamos una cookie que tiene un timpo de vida de 5 minutos
setcookie("cookieCorta", "5 minutitos", time()+300);

// cookie disponible en todo el sitio
setcookie("cookieSitio", "valor", 0, "/");

// cookie disponible en la carpeta "/dsw"
setcookie("cookieDSW", "valor", 0, "/dsw");

echo "<br>El valor de la cookie es... ".$_COOKIE["cookieDSW"];

//Elimina cookie
//setcookie("cookieBorrable", "", time()-100);

//Mostramos todas las cookies
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

?>