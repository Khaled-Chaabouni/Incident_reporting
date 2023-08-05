<?php 
session_start();
echo $_SESSION['userid'];
echo "______";
echo $_SESSION['username'];
echo "______";
echo $_SESSION['email'];
echo "______";
echo md5($_SESSION['password'],raw);
echo "______";
echo $_SESSION['lgdin'];
?>