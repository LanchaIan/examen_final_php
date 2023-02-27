<?php
class Electrodomestico
{
    protected $precio, $color, $consumo, $peso;
    protected const PRECIO = 100;
    protected const COLOR = 'BLANCO';
    protected const CONSUMO = 'F';
    protected const PESO = 5;

    public function __call($metodo, $argumentos)
    {
        $precio = isset($argumentos[0]) ? $argumentos[0] : Electrodomestico::PRECIO;
        $color = isset($argumentos[1]) ? $argumentos[1] : Electrodomestico::COLOR;
        $consumo = isset($argumentos[2]) ? $argumentos[2] : Electrodomestico::CONSUMO;
        $peso = isset($argumentos[3]) ? $argumentos[3] : Electrodomestico::PESO;
        if ($metodo == "__construct") {
            $this->precio = $precio;
            $this->color = $this->comprobarColor($color);
            $this->consumo = $this->comprobarConsumo($consumo);
            $this->peso = $peso;
        }
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getConsumo()
    {
        return $this->consumo;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    private function comprobarConsumo(string $letra)
    {
        $arrayConsumo = array('A', 'B', 'C', 'D', 'E', 'F');
        for ($i = 0; $i < sizeof($arrayConsumo); $i++) {
            if (array_key_exists($letra, $arrayConsumo)) {
                $this->consumo = $letra;
                return $letra;
            }
        }
    }

    private function comprobarColor(string $color)
    {
        $arrayColores = array('BLANCO', 'ROJO', 'NEGRO', 'AZUL', 'GRIS');

        for ($i = 0; $i < sizeof($arrayColores); $i++) {
            if (array_key_exists($color, $arrayColores)) {
                $this->color = $color;
                return $color;
            }
        }
    }

    public function precioFinal()
    {
        switch ($this->consumo) {
            case 'A':
                $this->precio += 100;
                break;

            case 'B':
                $this->precio += 80;
                break;

            case 'C':
                $this->precio += 60;
                break;

            case 'D':
                $this->precio += 50;
                break;

            case 'E':
                $this->precio += 30;
                break;

            case 'F':
                $this->precio += 10;
                break;
        }

        switch ($this->peso) {
            case 0 > $this->peso && $this->peso < 20:
                $this->precio += 10;
                break;

            case 20 >= $this->peso && $this->peso < 50:
                $this->precio += 50;
                break;

            case 50 >= $this->peso && $this->peso < 80:
                $this->precio += 80;
                break;

            case 80 >= $this->peso:
                $this->precio += 100;
                break;
        }

        return $this->precio;
    }
}
