<?php
// FPDFWrapper.php

namespace App;

require_once('fpdf/fpdf.php'); // Adjust the path according to your folder structure

class FPDFWrapper extends \FPDF {
    // Add any methods for generating PDFs using FPDF
    public function generateSamplePDF() {
        $this->AddPage();
        $this->SetFont('Arial','B',16);
        $this->Cell(40,10,'Hello, PDF!');
    }

    public function generateTable($header, $data) {
        // Column widths
        $w = [40, 35, 45, 40];

        // Header
        foreach ($header as $colIndex => $col) {
            $this->Cell($w[$colIndex], 7, $col, 1, 0, 'C');
        }
        $this->Ln();

        // Data
        foreach ($data as $row) {
            foreach ($row as $colIndex => $col) {
                $this->Cell($w[$colIndex], 6, $col, 1, 0, 'C');
            }
            $this->Ln();
        }
    }
}
?>