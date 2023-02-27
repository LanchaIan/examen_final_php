<?php
class Electrodomestico{
    public $precio_base;
    public $color;
    public $consumo = array(
        100 => "A",
        80 => "B",
        60 => "C",
        50 => "D",
        30 => "E",
        10 => "F"
    )
    public $peso;
    public function __construct($precio, $color, $consumo, $peso){
        $this->$precio_base=$precio;
        $this->$color=$color;
        $this->$consumo=$consumo;
        $this->$peso=$peso;
    }
}
$persona1=new Electrodomestico(100, "blanco","F",5);
?>