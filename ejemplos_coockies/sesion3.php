<?php

session_start();

phpinfo();

$_SESSION["Correo"] = "sergio@micorreo.com - Sesión3";

echo "<br>Sesión:";
print_r($_SESSION);
echo "<br>";
echo "<br>Cookies:";
print_r($_COOKIE);

?>