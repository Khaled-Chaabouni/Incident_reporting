<?php
    session_start();
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=md5($_POST['password']);
    //--------------------------------------------------------
    $_SESSION['lgdin'] = false;
    //Database Connection :
    require_once '../model/dbcon.php';

    //Verifying if the inputs had been filled :
    if(isset($_POST["email"]) and isset($_POST["password"])){
        //Preparing the SQL Query :
        $sql="select * from users where email='".$_SESSION['email']."' and password='".$_SESSION['password']."' limit 1";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        //Setting Session Variables Gathered from Database :
        $row=mysqli_fetch_assoc($result);
        $_SESSION['userid']=$row['user_id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];
        $_SESSION['acctype']=$row['account_type'];
        
        //Verifying Credentials :
        if($count==1){
            $_SESSION['lgdin'] = true;
            header('Location: ../view/index.php');
            echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
        }else{
            $_SESSION['lgdin'] = false;
            echo "<script type='text/javascript'>alert('Login Credentials incorrect')</script>";
        }		
      } 
?>
