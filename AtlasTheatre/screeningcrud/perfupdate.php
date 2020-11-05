<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");

	$s_id = null;
	if ( !empty($_GET['s_id'])) {
		$s_id = $_REQUEST['s_id'];
	}
	
	if ( null==$s_id ) {
   header("Location: ../screeningcrud/crud.php");
	}
	
	if ( !empty($_POST)) 
	{
		// keep track validation errors
		$s_dateError = null;
		$moviefkError = null;
		
		// keep track post values
		$s_date = $_POST['s_date'];
		$moviefk = $_POST['m_id'];
		
		// validate input
		$valid = true;
		if (empty($s_date)) {
			$screeningError = 'Please enter a screening date.';
			$valid = false;
		}
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE screening SET s_date = ?, m_id = ? WHERE s_id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($s_date, $moviefk, $s_id));
			Database::disconnect();
			header("Location: ../screeningcrud/crud.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM screening where s_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($s_id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$s_date = $data['s_date'];
		$moviefk = $data['m_id'];
		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Update a screening</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="perfupdate.php?s_id=<?php echo $s_id?>" method="post">
					  <div class="control-group <?php echo !empty($s_dateError)?'error':'';?>">
					    <label class="control-label">screening Date</label>
					    <div class="controls">
					      	<input name="s_date" type="text"  placeholder="screening Date" value="<?php echo !empty($s_date)?$s_date:'';?>">
					      	<?php if (!empty($nameError)): ?>
					      		<span class="help-inline"><?php echo $nameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($moviefkError)?'error':'';?>">
					    <label class="control-label">Movie ID</label>
					    <div class="controls">
					      	<input name="m_id" type="text"  placeholder="Movie ID" value="<?php echo !empty($moviefk)?$moviefk:'';?>">
					      	<?php if (!empty($moviefkError)): ?>
					      		<span class="help-inline"><?php echo $moviefkError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>

					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Update</button>
						  <a class="btn" href="crud.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
<?php
}
?>
