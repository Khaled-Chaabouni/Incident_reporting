
<?php
    //Datebase Connection :
    require_once '../model/dbcon.php';
    //--------------------------------------------------------
    session_start();
    $_SESSION['userid']=md5(rand());
    $_SESSION['username']=md5($_POST['username']);
    $_SESSION['email']=md5($_POST['email']);
    $_SESSION['password']=md5($_POST['password']);

    $_SESSION['admin']=0;
    //--------------------------------------------------------
    $_SESSION['lgdin'] = false;
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into users(user_id,username,email,password) values(?,?,?,?)");
        $stmt->bind_param('ssss',$_SESSION['userid'],$_SESSION['username'],$_SESSION['email'],$_SESSION['password']);
        $stmt->execute();
        header('Location: http://localhost/adactim/view/index.php');
        $stmt->close();
        $_SESSION['lgdin'] = true;
        /* $conn->close(); */
    }
?>
