<?php
    // Create a new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
            
    // Set the document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Adactim Agent');
    $pdf->SetTitle('Incident Report');
    $pdf->SetSubject('Report');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Add content to the PDF
    $pdf->Cell(0, 10, 'date: ' . $_SESSION['date'], 0, 1);
    $pdf->Cell(0, 10, 'type: ' . $_SESSION['type'], 0, 1);
    $pdf->Cell(0, 10, 'impact: ' . $_SESSION['impact'], 0, 1);
    $pdf->Cell(0, 10, 'content: ' . $_SESSION['content'], 0, 1);
    $pdf->Cell(0, 10, 'measures: ' . $_SESSION['measures'], 0, 1);

    // Close and output the PDF
    $pdf->Output('incident_report.pdf', 'D');
?>