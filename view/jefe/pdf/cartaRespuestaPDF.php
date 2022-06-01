<?php
//require('pdf/fpdf.php');
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        //izquuerda/arriba/tamaño   
        $this->Image('public/img/logoClinica.png', 6, 8, 60);
        $this->Ln(20);

        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(40);
        // Título
        $this->Cell(120, 10, utf8_decode('DATOS CARTA SOLICITUD'), 1, 0, 'C');
        // Salto de línea
        $this->Ln(30);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 10);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 10);
$pdf->SetFillColor(255, 0, 0);

$pdf->Cell(60, 8, utf8_decode('N° DE GESTION'), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('N° DE CARTA'), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode('DETALLE CARTA'), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataCartaPDF->num_gestion_carta), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataCartaPDF->num_carta), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode($dataCartaPDF->detalle_carta), 1, 1, 'C', 0);
$pdf->Ln(10);


$pdf->Cell(60, 8, utf8_decode('FECHA INGRESO'), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('FECHA VENCIMIENTO'), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode('ENTIDAD'), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataCartaPDF->fecha_ingreso), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataCartaPDF->fecha_vencimiento), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode($dataCartaPDF->entidad), 1, 1, 'C', 0);
$pdf->Ln(10);


$pdf->Cell(60, 8, utf8_decode('TIPO CARTA'), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('ORIGEN CARTA'), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode('NOMBRE PACIENTE'), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataCartaPDF->tipo_carta), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataCartaPDF->origen_carta), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode($dataCartaPDF->nombre_paciente), 1, 1, 'C', 0);
$pdf->Ln(10);


$pdf->Cell(60, 8, utf8_decode('ESTADO ACTUAL'), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('FECHA CORPORATIVO'), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode('FECHA RESPUESTA CORPORATIVO'), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataCartaPDF->estado), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataCartaPDF->fecha_envio_corp), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode($dataCartaPDF->fecha_respuesta_corp), 1, 1, 'C', 0);
$pdf->Ln(10);


$pdf->Cell(190, 8, utf8_decode('MOTIVO CARTA'), 1, 1, 'C', 0);
$pdf->Multicell(190,4.5, utf8_decode(wordwrap($dataCartaPDF->motivo_carta, 85, "\n")), 1, 1);
$pdf->Ln(8);

$pdf->Cell(190, 8, utf8_decode('INDICACIONES'), 1, 1, 'C', 0);
$pdf->Multicell(190,4.5, utf8_decode(wordwrap($dataCartaPDF->indicacion_corp, 85, "\n")), 1, 1);
$pdf->Ln(8);

$pdf->Cell(190, 8, utf8_decode('OBSERVACIONES'), 1, 1, 'C', 0);
$pdf->Multicell(190,4.5, utf8_decode(wordwrap($dataCartaPDF->observaciones, 85, "\n")), 1, 1);
$pdf->Ln(10);


$pdf->Output();
