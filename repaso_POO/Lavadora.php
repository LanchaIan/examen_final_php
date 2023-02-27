<?php
include("Electrodomestico.php");
class Lavadora extends Electrodomestico
{
  private $carga;
  private const CARGA = 5;

  function __call($metodo, $argumentos)
  {
    if ($metodo == "__construct") {
      //Constructor por defecto
      if (count($argumentos) == 0) {
        parent::__call($metodo, $argumentos);
        $this->carga = Lavadora::CARGA;
      }
      //Constructor con carga y atributos heredados
      else if (count($argumentos) == 5) {
        parent::__call($metodo, [$argumentos[0], $argumentos[1], $argumentos[2], $argumentos[3]]);
        $this->carga = $argumentos[4];
      }
      //Constructor con precio y peso
      else if (count($argumentos) == 2) {
        parent::__call($metodo, [$argumentos[0], "", "", $argumentos[1]]);
        $this->carga = Lavadora::CARGA;
      } else {
        echo "<b>ERROR</b>: Debes pasar el nº de parámetros adecuado";
      }
    }
  }

  public function getCarga()
  {
    return $this->carga;
  }

  public function precioFinal()
  {
    if ($this->carga > 30) {
      parent::$precio += 50;
    }
  }
}
/*
$var = new Lavadora();
$var->__call("__construct", []);
$var->getCarga();
*/

$var5 = new Lavadora();
$var5->__call("__construct", [120, 'ROJO', 'B', 25, 10]);
print_r($var5);

/*
$var2 = new Lavadora();
$var2->__call("__construct", [150, 75]);
*/