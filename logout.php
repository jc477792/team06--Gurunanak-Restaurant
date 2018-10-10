<?php
// *** Logout the current user.
$logoutGoTo = "login.php";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['email'] = NULL;
$_SESSION['id'] = NULL;
unset($_SESSION['email']);
unset($_SESSION['id']);
if ($logoutGoTo != "") {header("Location: login.php");
exit;
}
?>