<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body class="Landing">

<?php
include_once 'navbar.php';
?>

<div id="core">
    <?php
    require_once '../model/dbcon.php';
    ?>
    
    <div class="Home">
        <div class="quickdesc" style="color:black;padding:5em;padding-top:3em;">
            <img src="images/adactim_logo.png" style="padding-bottom:1em;">
            <h2>Welcome ► Adactim!</h2>
            <h2 style="font-weight: bold;">
            </h2>
            <p id="parg">
                Encountered a threat? Fill out a report!
            </p><br>
            <a href="report.php" class="btn btn-primary">Fill Form &#8594;</a>
        </div>
    </div>
</div>
</body>
</html>
