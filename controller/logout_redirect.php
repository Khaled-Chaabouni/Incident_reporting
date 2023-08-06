<?php

session_start();
session_destroy();
header('Location: http://localhost/adactim/view/index.php');

?>