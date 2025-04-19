<?php
// Inicia la salida sin espacios en blanco antes de esto
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

// Conexión a la base de datos
try {
    $conexion = new PDO("mysql:host=localhost;dbname=dieta;charset=utf8", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Crear la hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Paciente_DIETAS');

// Configurar hoja
$sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
$sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_LETTER);

// Logo
$sheet->mergeCells('A1:B2');
$logoPath = __DIR__ . '/../img/logo_4.png';
if (file_exists($logoPath)) {
    $drawing = new Drawing();
    $drawing->setName('Logo');
    $drawing->setPath($logoPath);
    $drawing->setHeight(202 * 0.57);
    $drawing->setWidth(250 * 0.53);
    $drawing->setCoordinates('A1');
    $drawing->setWorksheet($sheet);
}

// Texto central
$sheet->mergeCells('C1:L1')->setCellValue('C1', 'EMPRESA SOCIAL DEL ESTADO');
$sheet->mergeCells('C2:L2')->setCellValue('C2', 'HOSPITAL UNIVERSITARIO SAN JORGE DE PEREIRA' . PHP_EOL . 'INFORME DE DIETA DE PACIENTES');
$sheet->getStyle('C2')->getAlignment()->setWrapText(true);
$sheet->getRowDimension(2)->setRowHeight(-1);

// Información derecha
$sheet->mergeCells('M1:M2')->setCellValue('M1', "CODIGO: SISTEMAS FR-1\nVERSION: 1.0\nFECHA: 09/04/2025\nPAGINA: 1 DE 1");
$sheet->getStyle('M1')->getAlignment()->setWrapText(true);

// Estilos encabezado
$sheet->getStyle('A1:M2')->applyFromArray([
    'font' => ['bold' => true],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'ADD8E6']],
]);

$sheet->getRowDimension(1)->setRowHeight(39.5);
$sheet->getRowDimension(2)->setRowHeight(35.5);

// Títulos columnas
$titulos = [
    'A3' => 'Nro', 'B3' => 'CAMA', 'C3' => 'TIPO DOC', 'D3' => 'IDENTIFICACION',
    'E3' => 'NOMBRE', 'F3' => 'APELLIDO', 'G3' => 'GRUPO', 'H3' => 'SUBGRUPO',
    'I3' => 'COMIDA', 'J3' => 'OBSERVACIONES', 'K3' => 'ID PROF. SOLICITANTE',
    'L3' => 'NOMBRE PROF. SOLICITANTE', 'M3' => 'FECHA CREACION'
];
foreach ($titulos as $celda => $titulo) {
    $sheet->setCellValue($celda, $titulo);
}

// Estilo títulos
$sheet->getStyle('A3:M3')->applyFromArray([
    'font' => ['bold' => true],
    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['argb' => 'D3D3D3']],
    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
]);

// Agregar autofiltro a los títulos de las columnas
$sheet->setAutoFilter('A3:M3');

// Ajustes columnas
$sheet->getColumnDimension('A')->setWidth(6.10);
$sheet->getColumnDimension('B')->setWidth(11.86);
$sheet->getColumnDimension('C')->setWidth(11.86);
$sheet->getColumnDimension('D')->setWidth(20.14);
$sheet->getColumnDimension('E')->setWidth(29.86);
$sheet->getColumnDimension('F')->setWidth(29.86);
$sheet->getColumnDimension('G')->setWidth(29.86);
$sheet->getColumnDimension('H')->setWidth(29.86);
$sheet->getColumnDimension('I')->setWidth(20.14);
$sheet->getColumnDimension('J')->setWidth(30.86);
$sheet->getColumnDimension('K')->setWidth(20.43);
$sheet->getColumnDimension('L')->setWidth(31.43);
$sheet->getColumnDimension('M')->setWidth(23.43);

// Establece un ancho fijo (por ejemplo, 30)
$sheet->getColumnDimension('J')->setWidth(30);
// Activa ajuste de texto (wrap) en columna J
$sheet->getStyle('J')->getAlignment()->setWrapText(true);
// Activa el ajuste de texto para todas las celdas de la columna J (puedes usar un rango más específico si lo deseas)
$sheet->getStyle('J1:J999')->getAlignment()->setWrapText(true);

// Congelar encabezado
$sheet->freezePane('A4');

// Obtener datos
$sql = "SELECT paciente_id, cama, paciente_tipodoc, paciente_numdoc, paciente_nombre, paciente_apellido, paciente_grupo, paciente_subgrupo, paciente_comida, paciente_observacion, paciente_idSolicitante, paciente_nombreSolicitante, dia_creacion FROM paciente ORDER BY paciente_id ASC";
$stmt = $conexion->prepare($sql);
$stmt->execute();
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Validar que haya datos
if (empty($datos)) {
    die("No hay datos para exportar.");
}

// Insertar datos en la primera hoja
$fila = 4;
$nro = 1;
foreach ($datos as $dato) {
    $sheet->setCellValue('A' . $fila, $nro);
    $sheet->setCellValue('B' . $fila, $dato['cama']);
    $sheet->setCellValue('C' . $fila, $dato['paciente_tipodoc']);
    $sheet->setCellValue('D' . $fila, $dato['paciente_numdoc']);
    $sheet->setCellValue('E' . $fila, $dato['paciente_nombre']);
    $sheet->setCellValue('F' . $fila, $dato['paciente_apellido']);
    $sheet->setCellValue('G' . $fila, $dato['paciente_grupo']);
    $sheet->setCellValue('H' . $fila, $dato['paciente_subgrupo']);
    $sheet->setCellValue('I' . $fila, $dato['paciente_comida']);
    $sheet->setCellValue('J' . $fila, $dato['paciente_observacion']);
    $sheet->setCellValue('K' . $fila, $dato['paciente_idSolicitante']);
    $sheet->setCellValue('L' . $fila, $dato['paciente_nombreSolicitante']);
    $sheet->setCellValue('M' . $fila, $dato['dia_creacion']);
    $fila++;
    $nro++;
}

// Bordes y estilos filas
$sheet->getStyle('A4:M' . ($fila - 1))->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

// Filas alternas sombreadas
for ($i = 4; $i < $fila; $i++) {
    if ($i % 2 == 0) {
        $sheet->getStyle('A' . $i . ':M' . $i)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('F2F2F2');
    }
}

// Crear nueva hoja para el resumen
$summarySheet = $spreadsheet->createSheet();
$summarySheet->setTitle('Resumen');
$summarySheet->setCellValue('A1', 'Resumen de Pacientes con DIETAS');
$summarySheet->setCellValue('A2', 'Número total de pacientes:');
$summarySheet->setCellValue('B2', '=COUNTA(Paciente_DIETAS!A4:A' . ($fila - 1) . ')');
$summarySheet->getColumnDimension('A')->setWidth(30.57);
$summarySheet->getColumnDimension('B')->setWidth(15.57);

// Activar hoja principal
$spreadsheet->setActiveSheetIndex(0);

// Limpiar el buffer de salida
ob_end_clean();

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="reporte_dietas.xlsx"');
header('Cache-Control: max-age=0');

// Guardar el archivo Excel directamente en el flujo de salida
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
