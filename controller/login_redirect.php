<?php
    session_start();
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
    //--------------------------------------------------------
    $_SESSION['lgdin'] = false;
    //Database Connection :
    require_once 'dbcon.php';

    //Verifying if the inputs had been filled :
    if(isset($_POST["email"]) and isset($_POST["password"])){
        //Preparing the SQL Query :
        $sql="select * from registrations where email='".$_SESSION['email']."' and password='".$_SESSION['password']."' limit 1";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        //Setting Session Variables Gathered from Database :
        $row=mysqli_fetch_assoc($result);
        $_SESSION['id_user']=$row['id_user'];
        $_SESSION['firstname']=$row['firstname'];
        $_SESSION['lastname']=$row['lastname'];
        $_SESSION['phonenumber']=$row['number'];
        $_SESSION['birthday']=$row['birthday'];
        $_SESSION['gender']=@$row['gender'];
        $_SESSION['img']=$row['img'];
        $_SESSION['admin']=$row['administrator'];
        if(!isset($_SESSION['cart']))
      {
        $_SESSION['cart'] = array();
        $_SESSION['cart']['id'] = array();
        $_SESSION['cart']['name'] = array();
        $_SESSION['cart']['location'] = array();
        $_SESSION['cart']['price'] = array();
      }
        //Verifying Credentials :
        if($count==1){
            $_SESSION['lgdin'] = true;
            header('Location: http://localhost/projects/LearnAccount/LearnHome.php');
            echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
        }else{
            $_SESSION['lgdin'] = false;
            echo "<script type='text/javascript'>alert('Login Credentials incorrect')</script>";
        }		
      } 
?>