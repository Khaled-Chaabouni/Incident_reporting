<?php
    require_once '../model/dbcon.php';

    session_start();
    header('Refresh: 1;Location: http://localhost/adactim/view/index.php');

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
        include_once('generate_report_pdf.php');
        header('Location: http://localhost/adactim/view/index.php');
    }
    
    
    
    
    
    $stmt=$conn->prepare("insert into reports(sender,date,type,content,impact,measures) values(?,?,?,?,?,?)");
    $stmt->bind_param('ssssss',$_SESSION[userid],$_SESSION['date'],$_SESSION['type'],$_SESSION['content'],$_SESSION['impact'],$_SESSION['measures']);
    $stmt->execute();
    $stmt->close();
    
    
    var_dump($stmt);
    
    /* $conn->close(); */
?>

