<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/stylesheets/style.css?v=<?php echo time(); ?>">
    <title>Register</title>
</head>
<body>
    <main>
        <form action="../controller/register_redirect.php" method="post">
            <h1>Sign Up</h1>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="confirm_password">Password Again:</label>
                <input type="password" name="confirm_password" id="confirm_password">
            </div>
            <div>
                <label for="agree">
                    <input type="checkbox" name="agree" id="agree" value="yes" required/> I agree
                    with the
                    <a href="#" title="term of services">term of services</a>
                </label>
            </div>
            <button type="submit">Register</button>
            <footer>Already a member? <a href="signin.php">Login here</a></footer>
        </form>
    </main>

    <script>
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value !== confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>
</html>
