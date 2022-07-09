<?php
// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();


// Establecer propiedades
$objPHPExcel->getProperties()
    ->setCreator("Cattivo")
    ->setLastModifiedBy("Cattivo")
    ->setTitle("Documento Excel de Prueba")
    ->setSubject("Documento Excel de Prueba")
    ->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
    ->setKeywords("Excel Office 2007 openxml php")
    ->setCategory("Datos en Excel");


// Agregar Informacion
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'N°')
    ->setCellValue('B1', 'N° GESTION')
    ->setCellValue('C1', 'MES')
    ->setCellValue('D1', 'FECHA INCIDENCIA')
    ->setCellValue('E1', 'TIPO DOCUMENTO')
    ->setCellValue('F1', 'NUMERO DE DOCUMENTO')
    ->setCellValue('G1', 'PACIENTE')
    ->setCellValue('H1', 'TIPO PACIENTE')
    ->setCellValue('I1', 'ORIGEN')
    ->setCellValue('J1', 'AREA')
    ->setCellValue('K1', 'ESPECIALIDAD')
    ->setCellValue('L1', 'PERSONAL INVOLUCRADO')
    ->setCellValue('M1', 'SERVICIO')
    ->setCellValue('N1', 'HABITACION')
    ->setCellValue('O1', 'PROCEDENCIA')
    ->setCellValue('P1', 'NUMERO')
    ->setCellValue('Q1', 'TOMO')
    ->setCellValue('R1', 'PRIORIDAD')
    ->setCellValue('S1', 'CAUSA')
    ->setCellValue('T1', 'CAUSA ESPECIFICA')
    ->setCellValue('U1', 'DETALLE')
    ->setCellValue('V1', 'ACCION INMEDIATA')
    ->setCellValue('W1', 'ESTADO SEMAFORIZACION')
    ->setCellValue('X1', 'FECHA CIERRE')
    ->setCellValue('Y1', 'CONCLUSION')
    ->setCellValue('Z1', 'TIPO SEMAFORIZACION')
    ->setCellValue('AA1', 'DETALLE FINAL')
    ->setCellValue('AB1', 'USUARIO');


//Datos de la BD
$i = 2; //imprime en 2 fila
$a = 1;
foreach ($dataExcelPaus as $data) :
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A$i", $a)
        ->setCellValue("B$i", $data->num_requerimiento)
        ->setCellValue("C$i", $data->mes_incidencia)
        ->setCellValue("D$i", $data->fecha_incidencia)
        ->setCellValue("E$i", $data->nombre_documento)
        ->setCellValue("F$i", $data->numero_documento)
        ->setCellValue("G$i", $data->paciente)
        ->setCellValue("H$i", $data->nombre_tipo_paciente)
        ->setCellValue("I$i", $data->nombre_origen)
        ->setCellValue("J$i", $data->nombre_area)
        ->setCellValue("K$i", $data->nombre_especialidad)
        ->setCellValue("L$i", $data->personal_involucrado)
        ->setCellValue("M$i", $data->nombre_servicio)
        ->setCellValue("N$i", $data->nombre_habitacion)
        ->setCellValue("O$i", $data->nombre_procedencia)
        ->setCellValue("P$i", $data->numero_procedencia)
        ->setCellValue("Q$i", $data->tomo)
        ->setCellValue("R$i", $data->nombre_prioridad)
        ->setCellValue("S$i", $data->nombre_causa)
        ->setCellValue("T$i", $data->nombre_causa_especifica)
        ->setCellValue("U$i", $data->detalle)
        ->setCellValue("V$i", $data->accion_inmediata)
        ->setCellValue("W$i", $data->nombre_estado_semaforizacion)
        ->setCellValue("X$i", $data->fecha_cierre)
        ->setCellValue("Y$i", $data->nombre_conclusion)
        ->setCellValue("Z$i", $data->tipo_semaforizacion)
        ->setCellValue("AA$i",$data->detalle_final)
        ->setCellValue("AB$i",$data->nombre_usuario);
    $a++;
    $i++;

endforeach;


// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);


// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Datos.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//SOLUCION POSIBLE SI DA ERROR
ob_end_clean();
$objWriter->save('php://output');
exit;
