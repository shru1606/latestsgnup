<?php
// Redirect to login or signup page based on session
if (isset($_SESSION['email'])) {
    header('Location: home.php');
    exit();
} else {
    header('Location: login-user.php');
    exit();
}
?>
