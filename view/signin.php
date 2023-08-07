<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>
    <main>
        <form action="../controller/login_redirect.php" method="post">
            <h1>Sign in</h1>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Login</button>
            <footer>Create an account? <a href="signup.php">Register here</a></footer>
        </form>
    </main>
</body>
</html>