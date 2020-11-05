<?php 
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");

	$id = 0;
	
	if ( !empty($_GET['mem_id'])) {
		$mem_id = $_REQUEST['mem_id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$mem_id = $_POST['mem_id'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM customer WHERE mem_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($mem_id));
		Database::disconnect();
		header("Location: ../customercrud/crud.php");
		
	} 
?>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete a customer</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="mem_id" value="<?php echo $mem_id;?>"/>
					  <p class="alert alert-error">Are you sure to delete ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Yes</button>
						  <a class="btn" href="crud.php">No</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
<?php
}
?>