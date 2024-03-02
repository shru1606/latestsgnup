<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .password-toggle-btn {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                        <div id="email-error" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle-btn">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <script>
        // JavaScript to toggle password visibility
        document.addEventListener("DOMContentLoaded", function() {
            const togglePasswordBtn = document.querySelector('.password-toggle-btn');
            const passwordInput = document.getElementById('password');

            togglePasswordBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                // Toggle icon
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });

        // JavaScript to validate email format
        document.getElementById("email").addEventListener("input", function(event) {
            let value = event.target.value;
            if (!/\S+@\S+\.\S+/.test(value)) {
                event.target.classList.add("is-invalid"); // Add red border
                document.getElementById("email-error").textContent = "Invalid email format.";
                document.querySelector('input[type="submit"]').disabled = true; // Disable submit button
            } else {
                event.target.classList.remove("is-invalid"); // Remove red border
                document.getElementById("email-error").textContent = ""; // Clear error message
                document.querySelector('input[type="submit"]').disabled = false; // Enable submit button
            }
        });
    </script>
</body>
</html>
