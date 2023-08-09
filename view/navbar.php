
<head>
    <style>
        .navbar {
            background-color: rgba(0, 0, 0, 0.8); /* Black background with strong black tint */
            opacity:80%;
        }
        .navbar .nav-link {
            color: white; /* White text color */
        }
        .Home .quickdesc {
            background-color: white;
            color: black;
            padding: 5em;
            padding-top: 3em;
        }
        .navbar-logo {
            height: 30px; /* Adjust the height as needed */
            margin-right: 10px; /* Add some space between the logo and links */
            
        }
    </style>
</head>
<nav class="navbar navbar-expand-md justify-content-end">
    <div class="d-flex align-items-center"> <!-- New div for logo and navigation -->
        <!-- <img src="images/adactim_logo.png" alt="Adactim Logo" class="navbar-logo m-10"> -->
        <ul class="navbar-nav ml-auto">
        <?php
        session_start();
        if(basename($_SERVER['PHP_SELF']) === 'index.php'){
            if (isset($_SESSION['lgdin'])) {
                if ($_SESSION['lgdin']){
                    ?>
                    <?php
                    if (isset($_SESSION['acctype'])) {
                        if ($_SESSION['acctype']=="admin"){
                            ?>
                            <li class="nav-item"><a href="adminpanel.php" class="nav-link">Profiles</a></li>
                            <li class="nav-item"><a href="../controller/logout_redirect.php" class="nav-link">Logout</a></li>
                            <?php
                        }else{
                            ?>
                            <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
                            <li class="nav-item"><a href="../controller/logout_redirect.php" class="nav-link">Logout</a></li>
                            <?php 
                        }
                        ?>
                        
                        <?php
                    }else{
                        ?>
                        <li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
                        <li class="nav-item"><a href="../controller/logout_redirect.php" class="nav-link">Logout</a></li>
                        <?php
                    }
                    ?>
                    <?php
                }else{
                    ?>
                    <li class="nav-item"><a href="signup.php" class="nav-link">Sign up</a></li>
                    <?php
                }
            }else{
                ?>
                <li class="nav-item"><a href="signup.php" class="nav-link">Sign up</a></li>
                <?php
            }
        }else{
            ?>
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <?php
                if (isset($_SESSION['lgdin'])){
                    if ($_SESSION['lgdin']){
                        ?>
                        <li class="nav-item"><a href="../controller/logout_redirect.php" class="nav-link">Logout</a></li>
                        <?php
                    }else{
                        ?>
                        <li class="nav-item"><a href="../view/signin.php" class="nav-link">Sign up</a></li>
                        <?php
                    }
                }else{
                    ?>
                    <li class="nav-item"><a href="../view/signin.php" class="nav-link">Sign up</a></li>
                    <?php
                }
                ?>
                    
                    <?php 
        }
        ?>
        </ul>
    </div>
</nav>