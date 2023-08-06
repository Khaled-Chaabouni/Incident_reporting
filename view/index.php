
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../view/stylesheets/style.css?v=<?php echo time(); ?>">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="Landing" style="overflow: hidden;">
        <nav>
            <?php
                session_start();
                if (isset($_SESSION['lgdin'])) {
                    if ($_SESSION['lgdin']){
            ?>
                        <?php
                        if (isset($_SESSION['acctype'])) {
                            if ($_SESSION['acctype']=="admin"){
                        ?>
                                <ul>
                                    <!-- <li><a href="dashboard.php">Dashboard</a></li> -->
                                    <li><a href="adminpanel.php">Profiles</a></li>
                                    <li><a href="../controller/logout_redirect.php">Logout</a></li>
                                </ul>
                        <?php
                            }else{
                        ?>
                                <ul>
                                    <!-- <li><a href="dashboard.php">Dashboard</a></li> -->
                                    <li><a href="profile.php">Profile</a></li>
                                    <!-- <li><a href="settings.php">Settings</a></li> -->
                                    <li><a href="../controller/logout_redirect.php">Logout</a></li>
                                </ul>
                        <?php 
                            }
                        ?>
                        
                        <?php
                        }else{
                        ?>
                            <ul>
                                <!-- <li><a href="dashboard.php">Dashboard</a></li> -->
                                <li><a href="profile.php">Profile</a></li>
                                <!-- <li><a href="settings.php">Settings</a></li> -->
                                <li><a href="../controller/logout_redirect.php">Logout</a></li>
                            </ul>
                        <?php
                        }
                        ?>
            <?php
                    }else{
            ?>
                        <ul>
                            <li><a href="signup.php">Sign up</a></li>
                        </ul>
            <?php
                    }
                }else{
            ?>
                    <ul>
                        <li><a href="signup.php">Sign up</a></li>
                    </ul>
            <?php
                }
            ?>
        </nav>
        <div id="core">
            <?php
                require_once '../model/dbcon.php';
            ?>
            
            <div class="Home">
                <div class="quickdesc" style="background-color:white;color:black;padding:5em;padding-top:3em;">
                    <img src="images/adactim_logo.png" style="padding-bottom:1em;">
                    <h2>Welcome ► Adactim!</h2>
                    <h2 style="font-weight: bold;">
                    </h2>
                    <p id="parg">
                        Encountered a threat? fill out a report!
                    </p><br>
                    <a href="report.php" class="explorebtn">Fill form&#8594;</a>
                </div>
            </div>
        </div>
    </body>
</html>