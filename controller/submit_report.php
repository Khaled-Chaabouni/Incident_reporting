<?php
    require_once '../model/dbcon.php';

    session_start();
    $_SESSION['type']=$_POST['type'];
    $_SESSION['content']=$_POST['content'];
    $_SESSION['impact']=$_POST['impact'];
    $_SESSION['measures']=$_POST['measures'];
    
    $_SESSION['date'] = date('Y-m-d');

    $test_num=44;

    //--------------------------------------------------------
    
    
    $stmt=$conn->prepare("insert into reports(sender,date,type,content,impact,measures) values(?,?,?,?,?,?)");
    $stmt->bind_param('isssss',$test_num,$_SESSION['date'],$_SESSION['type'],$_SESSION['content'],$_SESSION['impact'],$_SESSION['measures']);
    $stmt->execute();
    // header('Location: http://localhost/adactim/view/index.php');

    var_dump($stmt);
    
    // $stmt->close();
    /* $conn->close(); */
?>

