<?php
    require_once '../model/dbcon.php';

    session_start();
    header('Refresh: 1;Location: ../view/index.php');

    // Get form inputs
    $_SESSION['type']=$_POST['type'];
    $_SESSION['content']=$_POST['content'];
    $_SESSION['impact']=$_POST['impact'];
    $_SESSION['measures']=$_POST['measures'];
    
    $_SESSION['date'] = date('Y-m-d');


    //--------------------------------------------------------
    
    
    // Include the TCPDF library
    require_once('../../libs/tcpdf/tcpdf.php');
    
    
    
    // Check if the form is submitted
    if (isset($_POST['submit'])){
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
        date_default_timezone_set('Africa/Tunis');
        $pdf->Output('incident_report_'.$_SESSION['date'].'_'.date('H-i-s').'.pdf', 'D');
        header('Location: http://localhost/adactim/view/index.php');
    }
    
    
    
    
    
    $stmt=$conn->prepare("insert into reports(sender,date,type,content,impact,measures) values(?,?,?,?,?,?)");
    $stmt->bind_param('ssssss',$_SESSION['userid'],$_SESSION['date'],$_SESSION['type'],$_SESSION['content'],$_SESSION['impact'],$_SESSION['measures']);
    $stmt->execute();
    $stmt->close();
    
    
    var_dump($stmt);
    
    /* $conn->close(); */
?>

