<?php
//Incluimos el fichero de conexion
//require("../Modelo/Conexion.php");

//Incluimos la libreria PDF
require('Vista/fpdf/fpdf.php');

class PDF extends FPDF {
    // Page header
    function Header() {
        // Add logo to page
        $this->Image('Vista/img/2.jpg',15,7.5,15);

        // Set font family to Arial bold 
        $this->SetFont('Arial','B',13);

        // Move to the right
        $this->Cell(80);

        // Header
        $this->Cell(95,10,'Comprobante de cita',1,0,'C');

        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {

        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Arial','I',8);

        // Page number
        $this->Cell(0,10,'Pag. ' . 
            $this->PageNo() . '/{nb}',0,0,'C');
    }
}

// Instantiation of FPDF class
$pdf = new PDF('L','mm','A4');

// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
////////////////////////////////////////////////////////////////////////////////

// // Declaramos el ancho de las columnas
// //$pdf->SetLeftMargin(55);

// //          N   A  D    E   G   E  P  LGN  ESC

//Declaramos el encabezado de la tabla

// $pdf->Cell(15,12,'Edad',1);
// $pdf->Cell(30,12,'Genero',1);
// $pdf->Cell(18,12,'Estatura',1);
// $pdf->Cell(17,12,'Peso',1);
// $pdf->Cell(45,12,'Lugar de Nacimiento',1);
// $pdf->Cell(35,12,'Estado Civil',1);
// //$pdf->Cell(50,12,utf8_decode('Contraseña'),1);


// Mostrar contenido Tabla
foreach($result as $row) {
    $pdf->Cell(0,6,'Nombres:');
    $pdf->Ln();
    $pdf->Cell(0,4,$row['pacnombres']);
    $pdf->Ln();
    $pdf->Cell(0,6,'Apellidos:');
    $pdf->Ln();
    $pdf->Cell(0,6, $row['pacapellidos']);
    $pdf->Ln();
    $pdf->Cell(0,6,$row['citnumero']);
    $pdf->Ln();
    $pdf->Cell(1,6,$row['citfecha']);
    $pdf->Ln();
    $pdf->Cell(2,6,$row['cithora']);
    $pdf->Ln();
    $pdf->Cell(3,6,$row['citpaciente']);
    $pdf->Ln();
    $pdf->Cell(4,6,$row['citmedico']);
    $pdf->Ln();
    $pdf->Cell(5,6,$row['citconsultorio']);
    $pdf->Cell(6,6,$row['citestado']);
    $pdf->Ln();
    }

//$pdf -> output();
?>