<?php
    class CuentaCorriente{
    private $number, $name, $money;

    public function __construct()
    {
        $n_args = func_num_args();

        if ($n_args==0) {
            $this->number = 0;
            $this->name = 'Manolo';
            $this->money = 100;
        }
        else {
            if ($n_args == 3) {
                $this->number = func_get_arg(0);
                $this->name = func_get_arg(1);
                $this->money = func_get_arg(2);
            } else
                echo "Numero de argumentos invalido";
        }
    }

    public function ingresarDinero(int $cantidad){
        if ($cantidad < 0) {
            echo "<script language='javascript'>alert('Por favor usa el metodo <b>retirarDinero</b> o usa valores por encima de 0');</script>";
        }else{
            $this->money += $cantidad;
            echo "<script language='javascript'>alert('Ha ingresado: $cantidad euros');</script>";
            $this->consultarDinero();
        }
    }

    public function retirarDinero(int $cantidad){
        if ($cantidad > $this->money) {
            echo "<script language='javascript'>alert('La cantidad a retirar es superior al dinero disponible');</script>";
        }else{
            $this->money -= $cantidad;
            echo "<script language='javascript'>alert('Ha retirado: $cantidad euros');</script>";
            $this->consultarDinero();
        }  
    }

    public function transferirDinero(CuentaCorriente $cuenta, int $cantidad){
        if ($cantidad > $this->money) {
            echo "<script language='javascript'>alert('No puedes dar mas dinero del que tienes');</script>";
        }else{
            if ($cantidad <= 0) {
                echo "<script language='javascript'>alert('Introduzca un valor por encima de 0');</script>";
            } else{
                $cuenta->money += $cantidad;
                $this->money -= $cantidad;
                $this->consultarDinero();
                $cuenta->consultarDinero();
            }
                
        }
    }

    public function consultarDinero(){
        echo "<script language='javascript'>alert('Tiene: $this->money euros');</script>";
    }
    }

$var = new CuentaCorriente(2, 'Jonathan', 1500);
$var->consultarDinero();
$var->ingresarDinero(200);
$var->consultarDinero();
$var->retirarDinero(700);
$cuentaNueva = new CuentaCorriente(5, 'pepe', 1000);
$var->transferirDinero($cuentaNueva, 500);


