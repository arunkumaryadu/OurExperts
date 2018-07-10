<?php $page="dummy" ?>
<?php require_once 'header.php';?>
<?php
unset($_SESSION["email"]);
unset($_SESSION["role"]);
session_destroy();
redirect("login.php");
?>
<?php require_once 'footer.php';?>
