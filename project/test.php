<?php

include_once'model/dbcon.php';
session_start();
echo $_SESSION['userid'],"//",$_SESSION['date'],"//",$_SESSION['type'],"//",$_SESSION['content'],"//",$_SESSION['impact'],"//",$_SESSION['measures'];

?>