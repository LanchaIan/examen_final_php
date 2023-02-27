<?php
    class Television extends Electrodomestico{
    private $resolucion;
    private $sintonizador;

    function __call($metodo, $argumentos)
    {
        if ($metodo == "__construct") {
            //Constructor por defecto
            if (count($argumentos) == 0) {
              parent::__call($metodo, $argumentos);
                $this->resolucion = 20;
                $this->sintonizador = false;
            }
            //Constructor con resolucion, sintonizador  y atributos heredados
            else if (count($argumentos) == 6) {
              parent::__call($metodo, [$argumentos[0], $argumentos[1], $argumentos[2], $argumentos[3]]);
              $this->resolucion = $argumentos[4];
              $this->sintonizador = $argumentos[5];
      
            } 
            //Constructor con precio y peso
            else if (count($argumentos) == 2) {
              parent::__call($metodo, [$argumentos[0], "", "", $argumentos[1]]);
              $this->resolucion = 20;
              $this->sintonizador = false;
            } 
            else {
              echo "<b>ERROR</b>: Debes pasar el nº de parámetros adecuado";
            }
        }
    }

    public function getResolucion(){
        return $this->resolucion;
    }

    public function getSintonizador(){
        return $this->sintonizador;
    }

    public function precioFinal()
    {
        if ($this->resolucion > 40) {
            parent::$precio += (parent::$precio*.3);
        }
        if ($this->sintonizador == true) {
            parent::$precio += 50;
        }
    }
    }
?>