<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
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
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                        <div class="input-group">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Create new password" required>
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle-btn">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="password" name="cpassword" id="cpassword" placeholder="Confirm your password" required>
                            <div class="input-group-append">
                                <span class="input-group-text password-toggle-btn">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <script>
        // JavaScript to toggle password visibility
        document.addEventListener("DOMContentLoaded", function() {
            const togglePasswordBtns = document.querySelectorAll('.password-toggle-btn');
            const passwordInput = document.getElementById('password');
            const cpasswordInput = document.getElementById('cpassword');

            togglePasswordBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const type = this.closest('.input-group').querySelector('input').getAttribute('type') === 'password' ? 'text' : 'password';
                    this.closest('.input-group').querySelector('input').setAttribute('type', type);
                    // Toggle icon
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            });
        });
    </script>
</body>
</html>
