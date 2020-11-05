<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");

	$id = 0;
	
	if ( !empty($_GET['s_id'])) {
		$s_id = $_REQUEST['s_id'];
	}
	
	if ( !empty($_POST)) {
		// keep track post values
		$s_id = $_POST['s_id'];
		
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM screening WHERE s_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($s_id));
		Database::disconnect();
		     header("Location: ../screeningcrud/crud.php");
		
	} 
?>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Delete a screening</h3>
		    		</div>
		    		
	    			<form class="form-horizontal" action="perfdelete.php" method="post">
	    			  <input type="hidden" name="s_id" value="<?php echo $s_id;?>"/>
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