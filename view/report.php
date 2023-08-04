
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../view/stylesheets/style.css?v=<?php echo time(); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    </head>
    <body class="Landing">
        <?php
            require_once '../model/dbcon.php';
        ?>
        
        <div class="Home">
            <main>
                <form action="../controller/submit_report.php" method="POST">
                    <h1>Report card</h1>

                    <label for="type">Type of threat :</label><br>
                    <input type="text" id="type" name="type"><br>

                    <label for="content">Provide details :</label><br>
                    <input type="text" id="content" name="content"><br>
                    
                    <label for="impact">Rate the incident :</label><br>
                    <input list="impacts" name="impact" id="impact">
                        <datalist id="impacts">
                            <option value="light">
                            <option value="moderate">
                            <option value="severe">
                        </datalist><br>
                    
                    <label for="measures">Measures to be taken :</label><br>
                    <input type="text" id="measures" name="measures"><br><br>

                    <button type="submit">Submit</button>

                </form>
            </main>
        </div>
    </body>
</html>