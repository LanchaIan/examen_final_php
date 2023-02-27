<?php
abstract class CampoFormulario
{
    protected $nombre;
    protected $id;

    public function __call($metodo, $arguments)
    {
        if ($metodo == "__construct") {
            if (count($arguments) == 2) {
                $this->nombre = $arguments[0];
                $this->id = $arguments[1];
            }else {
                echo "<b>ERROR</b>: Debes pasar el nº de parámetros adecuado";
            }
        }
        
    }

    abstract public function generaHTML();

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}


/***************************************************************** */

class Text extends CampoFormulario
{
    private $maxlength;
    private $value;

    const MAXLENGTH = 10;

    public function __call($metodo, $arguments)
    {
        if ($metodo == "__construct") {
            if (count($arguments) == 0) {
                parent::__call('__construct', ['Jonathan', 'G201']);
                $this->maxlength = Text::MAXLENGTH;
                $this->value = '';
            } else if (count($arguments) == 4) {
                parent::__call('__construct', [$arguments[0], $arguments[1]]);
                $this->maxlength = $arguments[2];
                $this->value = $arguments[3];
            } else {
                echo "<b>ERROR</b>: Debes pasar el nº de parámetros adecuado, pero este es el de texto para diferenciarlo";
            }
        }
    }

    public function getMaxLength()
    {
        return $this->maxlength;
    }

    public function setMaxLength($maxlength)
    {
        $this->maxlength = $maxlength;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function generaHTML()
    {
        return "<input id='" . $this->getId() .
            "' type='text' name='" . $this->getName() .
            "' value='" . $this->getValue() .
            "' maxlength='" . $this->getMaxlength() .
            "' required>";
    }

}

$varTextVacio = new Text();
$varTextVacio->__call('__construct', []);

$varTextLleno = new Text();
$varTextLleno->__call('__construct', ['pepe', 'ID123456789', '5', 'maximo']);

echo "<html><head></head><body><form>";
echo $varTextVacio->generaHTML();
echo "</form></body></html>";

echo "<br>";
print_r($varTextVacio);

echo "<br><br><br><br><br><br>";

echo "<html><head></head><body><form>";
echo $varTextLleno->generaHTML();
echo "</form></body></html>";

echo "<br>";
print_r($varTextLleno);
