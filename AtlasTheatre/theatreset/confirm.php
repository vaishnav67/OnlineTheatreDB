<?php 
session_start();
if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");
	    $id = null;
    if ( !empty($_GET['t_id'])) {
        $t_id = $_REQUEST['t_id'];
    }
     
    if ( null==$t_id ) {
        	header("Location: ../theatreset/set.php");
        	} else {
        		$_SESSION['theatre']=$t_id;
        		header("Location: ../globalcrud.php");
    }
}
?>