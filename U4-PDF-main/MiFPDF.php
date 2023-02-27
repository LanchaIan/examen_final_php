<?php
require('MiPDF.php');
require('fpdf/fpdf.php');

class MiFPDF extends MiPDF
{

    public $pdf;

    public function generaDoc()
    {
        // Inicializando Variables PDF
        $titulo = $this->getTitulo();
        $contenido = $this->getContenido();
        $tipoletra = $this->getTipoletra();
        $tamano = $this->getTamano();
        $alineacion = $this->getAlineacion();

        // Añado Pagina Crear PDF
        $this->pdf = new FPDF();
        $this->pdf->AddPage();

        // Titulo
        $this->pdf->SetFont($tipoletra, "", $tamano);
        $this->pdf->SetTitle($titulo);

        // Contenido
        $this->pdf->SetFont($tipoletra, "", $tamano);
        $this->pdf->Cell(0, 15, $contenido, false, $alineacion);
    }

    public function almacenaDoc()
    {
        $dir = "./pdf/";
        $nombre = $this->getTitulo() . ".pdf";
        $dir_nombre = $dir . $nombre;
        $this->pdf->Output("F", $dir_nombre, true);
    }

    public function devuelveDoc()
    {
        $this->pdf->Output();
    }
}
?>
