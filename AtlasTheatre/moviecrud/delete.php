<?php 
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");

	$id = 0;
	
	if ( !empty($_GET['m_id'])) {
		$m_id = $_REQUEST['m_id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$m_id = $_POST['m_id'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM movie WHERE m_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($m_id));
		Database::disconnect();
		header("Location: ../moviecrud/crud.php");
		
	} 
?>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete a movie</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="m_id" value="<?php echo $m_id;?>"/>
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