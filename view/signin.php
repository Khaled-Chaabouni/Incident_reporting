<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<?php
include_once'navbar.php';
?>
<main class="container mt-5">
    <form class="col-md-4 mx-auto border rounded shadow p-4 needs-validation" action="../controller/login_redirect.php" method="post" novalidate>
        <h1 class="mb-4">Sign in</h1>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
            <div class="invalid-feedback">
                Please enter a valid email.
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
            <div class="invalid-feedback">
                Please enter a password.
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <footer class="mt-3">Need an account? <a href="signup.php">Register here</a></footer>
    </form>
</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var email = document.getElementById("email");
        var password = document.getElementById("password");

        function validateEmail() {
            var emailValue = email.value.trim();
            var isValidEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue);

            email.classList.toggle("is-valid", isValidEmail);
            email.classList.toggle("is-invalid", !isValidEmail);
        }

        function validatePassword() {
            password.classList.toggle("is-valid", password.value !== "");
            password.classList.toggle("is-invalid", password.value === "");
        }

        function validateForm() {
            // Call the individual validation functions
            validateEmail();
            validatePassword();
        }

        email.addEventListener("input", validateEmail);
        password.addEventListener("input", validatePassword);

        document.querySelector("form").addEventListener("submit", function(event) {
            // Validate the form when submitted
            validateForm();
            
            // Prevent submission if form is invalid
            if (!this.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            // Add 'was-validated' class to the form to show validation state
            this.classList.add('was-validated');
        });
    </script>
</body>
</html>
