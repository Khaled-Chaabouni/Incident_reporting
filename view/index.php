
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../view/stylesheets/style.css?v=<?php echo time(); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    </head>
    <body class="Landing">
        <main>
            <?php
                require_once '../model/dbcon.php';
            ?>
            
            <div class="Home">
                <h2>Welcome ► Adactim!</h2>
                <div class="quickdesc">
                    <h2 style="font-weight: bold;">
                    
                    </h2>
                    <p id="parg">
                        Encountered a threat? fill out a report!.
                    </p><br>
                    <a href="report.php" class="explorebtn">Fill form&#8594;</a>
                </div>
            </div>
        </main>
    </body>
</html>