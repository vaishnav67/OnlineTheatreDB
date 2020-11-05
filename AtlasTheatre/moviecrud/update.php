<?php 
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");

	$movieid = null;
	if ( !empty($_GET['m_id'])) {
		$movieid = $_REQUEST['m_id'];
	}
	
	if ( null==$movieid ) {
			header("Location: ../moviecrud/crud.php");
	}
	
	if (!empty($_POST)) 
	{
		// keep track validation errors
		$movienameError = null;
		$moviedateError = null;
		$moviepriceError = null;
		$movieimageError = null;
		
		// keep track post values
		$moviename = $_POST['m_title'];
		$moviedate = $_POST['m_date'];
		$movieprice = $_POST['price'];
		$movieimage = $_POST['image'];
		
		// validate input
		$valid = true;
		if (empty($moviename)) {
			$movienameError = 'Please enter a movie name.';
			$valid = false;
		}
		

		if (empty($moviedate)) {
			$moviedateError = 'Please enter the movie date.';
			$valid = false;
		}

		if (empty($movieprice)) {
            $moviepriceError = 'Please enter movie Price';
            $valid = false;
        } 

        if (empty($movieimage)) {
            $movieimageError = 'Please enter movie Image';
            $valid = false;
        } 
		
		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE movie SET m_title = ?, m_date = ?, price = ?, image = ? WHERE m_id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($moviename,$moviedate,$movieprice,$movieimage,$movieid));
			Database::disconnect();
			header("Location: ../moviecrud/crud.php");
		}
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM movie where m_id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($movieid));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$moviename = $data['m_title'];
		$moviedate = $data['m_date'];
		$movieprice = $data['price'];
		$movieimage = $data['image'];
		Database::disconnect();
	}
?>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Update a movie</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="update.php?m_id=<?php echo $movieid?>" method="post">
					  <div class="control-group <?php echo !empty($movienameError)?'error':'';?>">
					    <label class="control-label">movie Name</label>
					    <div class="controls">
					      	<input name="m_title" type="text"  placeholder="movie Name" value="<?php echo !empty($moviename)?$moviename:'';?>">
					      	<?php if (!empty($movienameError)): ?>
					      		<span class="help-inline"><?php echo $movienameError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
                      <div class="control-group <?php echo !empty($moviedateError)?'error':'';?>">
                        <label class="control-label">movie Date</label>
                        <div class="controls">
                            <input name="m_date" type="text" placeholder="movie Date" value="<?php echo !empty($moviedate)?$moviedate:'';?>">
                            <?php if (!empty($moviedateError)): ?>
                                <span class="help-inline"><?php echo $moviedateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
					   <div class="control-group <?php echo !empty($moviepriceError)?'error':'';?>">
                        <label class="control-label">movie Price</label>
                        <div class="controls">
                            <input name="price" type="text" placeholder="movie Price" value="<?php echo !empty($movieprice)?$movieprice:'';?>">
                            <?php if (!empty($moviepriceError)): ?>
                                <span class="help-inline"><?php echo $moviepriceError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($movieimageError)?'error':'';?>">
                        <label class="control-label">movie Image</label>
                        <div class="controls">
                            <input name="image" type="text" placeholder="movie Image" value="<?php echo !empty($movieimage)?$movieimage:'';?>">
                            <?php if (!empty($movieimageError)): ?>
                                <span class="help-inline"><?php echo $movieimageError;?></span>
                            <?php endif;?>
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