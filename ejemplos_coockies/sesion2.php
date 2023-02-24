<?php

session_start();

$_SESSION["Apellido"] = "Ramos - Sesión2";

echo "<br>Sesión:";
print_r($_SESSION);
echo "<br>";
echo "<br>Cookies:";
print_r($_COOKIE);

?>