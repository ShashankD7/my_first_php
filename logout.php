<?php
session_start();
session_unset();
session_destroy();

setcookie('email', '', time() - 3600, "/"); // Delete the cookie

header("Location: login.php");
exit();
?>