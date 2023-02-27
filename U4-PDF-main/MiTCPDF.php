<?php
    require('MiPDF.php');
    require('TCPDF-main/tcpdf.php');
    class MiTCPDF extends MiPDF{

        public $tcpdf;

        public function generaDoc(){

             // Inicializando Variables PDF
            $titulo = $this->getTitulo();
            $contenido = $this->getContenido();
            $tipoletra = $this->getTipoletra();
            $tamano = $this->getTamano();

            // Añado Pagina Crear PDF
            $this->tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $this->tcpdf->setFont($tipoletra, "", $tamano);
            $this->tcpdf->AddPage();

            // Titulo
            $this->tcpdf->setTitle($titulo);

            // Contenido
            $this->tcpdf->Write(0, $contenido);

        }

        public function almacenaDoc(){
            $dir = "./pdf/";
            $nombre = $this->getTitulo() . ".pdf";
            $dir_nombre = $dir . $nombre;
            ob_clean();
            $this->tcpdf->Output($dir_nombre, "F");
        }

        public function devuelveDoc(){
            $this->tcpdf->Output();
        }
    }
?>