
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../view/stylesheets/style.css?v=<?php echo time(); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../view/stylesheets/style.css?v=<?php echo time(); ?>">
        <script>
            document.getElementById("reportform").addEventListener("submit", function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();
                alert("fuck");
                // Handle the form submission here (optional)

                // Redirect to the specified location
                window.location.href = "http://localhost/adactim/view/index.php";
            });
        </script>
    </head>
    <body class="Landing">
        <?php
            require_once '../model/dbcon.php';
        ?>
        
        <div class="Home">
            <main>
                <form action="../controller/submit_report.php" method="POST" id="reportform">
                    <h1>Report card</h1>

                    <label for="type">Type of threat :</label><br>
                    <input type="text" id="type" name="type" required><br>

                    <label for="content">Provide details :</label><br>
                    <textarea id="content" name="content" rows="4" cols="50" style="resize: none;" required></textarea><br>
                    
                    <label for="impact">Rate the incident :</label><br>
                    <input list="impacts" name="impact" id="impact" required>
                        <datalist id="impacts">
                            <option value="light">
                            <option value="moderate">
                            <option value="severe">
                        </datalist><br>
                    
                    <label for="measures">Measures to be taken :</label><br>
                    <input type="text" id="measures" name="measures" required><br><br>

                    <button type="submit" type="submit" name="submit" value="submit">Generate Report</button>
                </form>
                
            </main>
        </div>
    </body>
</html>