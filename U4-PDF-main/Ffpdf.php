<?php
    require('MiFPDF.php');

    if ($_GET) {
        // variables Generar PDF
        $titulo = $_GET['titulo'];
        $contenido = $_GET['contenido'];
        $tipoletra = $_GET['tipoletra'];
        $tamano = $_GET['tamano'];
        $alineacion = $_GET['alineacion'];
        
        $pdf = new MiFPDF($titulo, $contenido, $tipoletra, $tamano, $alineacion);
        // $pdf = new MiFPDF($titulo, $contenido);
        $pdf->generaDoc();
        $pdf->almacenaDoc();
        $pdf->devuelveDoc();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>

<body>
    <h4>Generar PDF con MiPDF</h4>
    <form action="Ffpdf.php" method="get">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo">
        <br><br>
        <label for="contenido">Contenido</label>
        <br>
        <textarea type="text" name="contenido"></textarea>
        <br><br>
        <label for="tipoletra">Tipo Letra</label>
        <input type="text" name="tipoletra">
        <br><br>
        <label for="tamano">Tamaño</label>
        <input type="number" name="tamano">
        <br><br>
        <label for="alineacion"> Seleccione cómo quiere alinear</label>
        <select name="alineacion" id="alineacion">
            <option value="L">Izquierda</option>
            <option value="R">Derecha</option>
            <option value="C">Centrada</option>
        </select>
        <br><br>
        <button type="submit">Generar con FPDF</button>
    </form>


</body>

</html>