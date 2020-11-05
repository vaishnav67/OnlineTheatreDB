
<?php
session_start();
include ("./includes/header.php"); ?>
  
<?php
unset($_SESSION['customer']);
    header("Location: ./index.php");
?>