<?php
    abstract class MiPDF{

        private $titulo;
        private $contenido;
        private $tipoletra;
        private $tamano;
        private $alineacion;

        // public function __construct()
        // {
        //     // obtengo el array con los parametros enviados a la funcion
        //     $params = func_get_args();

        //     // numero de parametros que recibo
        //     $num_params = func_get_args();

        //     // compruebo si hay constructor con ese numero de parametros
        //     if (method_exists($this, '__construct' . $num_params)) {
        //         call_user_func_array(array($this, '__construct' . $num_params),$params);
        //     }
        // }

        // function __construct2($titulo, $contenido){
        //     $this->__construct5($titulo, $contenido, "Arial", "15", "R");
        // }

        // function __construct5($titulo, $contenido, $tipoletra, $tamano, $alineacion){
        //     $this-> titulo = $titulo;
        //     $this-> contenido = $contenido;
        //     $this-> tipoletra = $tipoletra;
        //     $this-> tamano = $tamano;
        //     $this->alineacion = $alineacion;
        // }

        function __construct($titulo, $contenido, $tipoletra, $tamano, $alineacion){
            $this-> titulo = $titulo;
            $this-> contenido = $contenido;
            $this-> tipoletra = $tipoletra;
            $this-> tamano = $tamano;
            $this->alineacion = $alineacion;
        }

        public function setTitulo($titulo){
            $this-> titulo = $titulo;
        }

        public function setContenido($contenido){
            $this-> contenido = $contenido;
        }

        public function setTipoLetra($tipoletra){
            $this-> tipoletra = $tipoletra;
        }

        public function setTamano($tamano){
            $this-> tamano = $tamano;
        }

        public function setAlineacion($alineacion){
            $this-> alineacion = $alineacion;
        }

        public function getTitulo(){
            return $this-> titulo;
        }

        public function getContenido(){
            return $this-> contenido;
        }

        public function getTipoLetra(){
            return $this-> tipoletra;
        }

        public function getTamano(){
            return $this-> tamano;
        }

        public function getAlineacion(){
            return $this-> alineacion;
        }

        abstract public function generaDoc();
        abstract public function almacenaDoc();
        abstract public function devuelveDoc();

        // abstract public function almacenaDoc();
        // abstract public function devuelveDoc();
    }
?>