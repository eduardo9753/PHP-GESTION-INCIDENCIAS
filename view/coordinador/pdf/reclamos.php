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
        $this->Cell(120, 10, utf8_decode('DATOS RECLAMO'), 1, 0, 'C');
        // Salto de línea
        $this->Ln(15);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 8);
$pdf->SetFillColor(255, 0, 0);

$pdf->Cell(60, 8, utf8_decode('N° '), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('FECHA INCIDENTE'), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode('TIPO PACIENTE'), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataIncidenciaPDF->num_requerimiento), 1, 0, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataIncidenciaPDF->fecha_incidencia), 1, 0, 'C', 0);
$pdf->Cell(70, 8, utf8_decode($dataIncidenciaPDF->nombre_tipo_paciente), 1, 1, 'C', 0);
$pdf->Ln(8);



$pdf->Cell(30, 8, utf8_decode('DOCUMENTO'), 1, 0, 'C', 0);
$pdf->Cell(30, 8, utf8_decode('N° DOCUMENTO'), 1, 1, 'C', 0);
$pdf->Cell(30, 8, utf8_decode($dataIncidenciaPDF->nombre_documento), 1, 0, 'C', 0);
$pdf->Cell(30, 8, utf8_decode($dataIncidenciaPDF->numero_documento), 1, 1, 'C', 0);
$pdf->Ln(8);



/*$pdf->Cell(30, 8, utf8_decode('CELULAR'), 1, 0, 'C', 0);
$pdf->Cell(30, 8, utf8_decode('NACIONALIDAD'), 1, 1, 'C', 0);
$pdf->Cell(30, 8, utf8_decode($dataIncidenciaPDF->tele_celular), 1, 0, 'C', 0);
$pdf->Cell(30, 8, utf8_decode($dataIncidenciaPDF->nacionalidad), 1, 1, 'C', 0);
$pdf->Ln(8);*/


$pdf->Cell(100, 8, utf8_decode('NOMBRE PACIENTE'), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode('ORIGEN'), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode('AREA'), 1, 1, 'C', 0);
$pdf->Cell(100, 8, utf8_decode(strtoupper($dataIncidenciaPDF->paciente)), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode($dataIncidenciaPDF->nombre_origen), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode($dataIncidenciaPDF->nombre_area), 1, 1, 'C', 0);
$pdf->Ln(8);


/*$pdf->Cell(100);
$pdf->Cell(-1, -1, 'PREGUNTAS RESPONDIDAS', 1, 1, 'C', 0);
$pdf->Ln(8);
*/


$pdf->Cell(45, 8, utf8_decode('PERSONAL'), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode('PRIORIDAD'), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode('HABITACION'), 1, 0, 'C', 0);
$pdf->Cell(55, 8, utf8_decode('SERVICIOS'), 1, 1, 'C', 0);
$pdf->Cell(45, 8, utf8_decode($dataIncidenciaPDF->personal_involucrado), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode($dataIncidenciaPDF->nombre_prioridad), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode($dataIncidenciaPDF->nombre_habitacion), 1, 0, 'C', 0);
$pdf->Cell(55, 8, utf8_decode($dataIncidenciaPDF->nombre_servicio), 1, 1, 'C', 0);
$pdf->Ln(8);


$pdf->Cell(60, 8, utf8_decode('ESPECIALIDAD'), 1, 0, 'C', 0);
$pdf->Cell(130, 8, utf8_decode('CAUSA'), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode($dataIncidenciaPDF->nombre_especialidad), 1, 0, 'C', 0);
$pdf->Cell(130, 8, utf8_decode($dataIncidenciaPDF->nombre_causa), 1, 1, 'C', 0);
$pdf->Ln(8);


$pdf->Cell(20, 8, utf8_decode('ESTADO'), 1, 0, 'C', 0);
$pdf->Cell(23, 8, utf8_decode('NUMERO'), 1, 0, 'C', 0);
$pdf->Cell(147, 8, utf8_decode('CAUSA ESPECIFICA'), 1, 1, 'C', 0);
$pdf->Cell(20, 8, utf8_decode($dataIncidenciaPDF->nombre_estado_semaforizacion), 1, 0, 'C', 0);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(23, 8, utf8_decode($dataIncidenciaPDF->numero_procedencia .'-'.$dataIncidenciaPDF->tomo), 1, 0, 'C', 0);
$pdf->SetFont('Times', 'B', 8);
$pdf->Cell(147, 8, utf8_decode($dataIncidenciaPDF->nombre_causa_especifica), 1, 1, 'C', 0);
$pdf->Ln(8);



$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(190, 8, utf8_decode('DETALLE'), 1, 1, 'C', 0);
$pdf->Multicell(190,4.4, utf8_decode(wordwrap($dataIncidenciaPDF->detalle, 125, "\n")), 1, 1);
$pdf->Ln(8);


$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(190, 8, utf8_decode('DETALLE FINAL'), 1, 1, 'C', 0);
$pdf->Multicell(190,4.4, utf8_decode(wordwrap($dataIncidenciaPDF->detalle_final, 125, "\n")), 1, 1);
$pdf->Ln(8);



$pdf->SetFont('Times', 'B', 11);
$pdf->Cell(190, 8, utf8_decode('ACCION INMEDIATA'), 1, 1, 'C', 0);
$pdf->Multicell(190,4.4, utf8_decode(wordwrap($dataIncidenciaPDF->accion_inmediata, 125, "\n")), 1, 1);
$pdf->Ln(8);



$pdf->Output();
