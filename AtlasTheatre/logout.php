
<?php
session_start();
include ("./includes/header.php"); ?>
  
<?php
unset($_SESSION['employee']);
    header("Location: ./index.php");
?>