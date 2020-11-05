<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");	
	
    if ( !empty($_POST)) {
        // keep track validation errors
        $movienameError = null;
        $moviedateError = null;
        $moviepriceError = null;
        $movieimageError = null;
         
        // keep track post values
        $moviename = $_POST['moviename'];
        $moviedate = $_POST['moviedate'];
        $movieprice = $_POST['movieprice'];
        $movieimage = $_POST['movieimage'];
         
        // validate input
        $valid = true;
        if (empty($moviename)) {
            $movienameError = 'Please enter movie Name';
            $valid = false;
        }
         

        if (empty($moviedate)) {
            $moviedateError = 'Please enter movie Date';
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
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO movie (m_title,m_date,price,image) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($moviename,$moviedate,$movieprice,$movieimage));
            Database::disconnect();
            header("Location: ../moviecrud/crud.php");
        }
    }
?>

<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a movie</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($movienameError)?'error':'';?>">
                        <label class="control-label">movie Name</label>
                        <div class="controls">
                            <input name="moviename" type="text"  placeholder="movie Name" value="<?php echo !empty($moviename)?$moviename:'';?>">
                            <?php if (!empty($movienameError)): ?>
                                <span class="help-inline"><?php echo $movienameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($moviedateError)?'error':'';?>">
                        <label class="control-label">movie Date</label>
                        <div class="controls">
                            <input name="moviedate" type="text" placeholder="movie Date" value="<?php echo !empty($moviedate)?$moviedate:'';?>">
                            <?php if (!empty($moviedateError)): ?>
                                <span class="help-inline"><?php echo $moviedateError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($moviepriceError)?'error':'';?>">
                        <label class="control-label">movie Price</label>
                        <div class="controls">
                            <input name="movieprice" type="text" placeholder="movie Price" value="<?php echo !empty($movieprice)?$movieprice:'';?>">
                            <?php if (!empty($moviepriceError)): ?>
                                <span class="help-inline"><?php echo $moviepriceError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($movieimageError)?'error':'';?>">
                        <label class="control-label">movie Image</label>
                        <div class="controls">
                            <input name="movieimage" type="text" placeholder="movie Image" value="<?php echo !empty($movieimage)?$movieimage:'';?>">
                            <?php if (!empty($movieimageError)): ?>
                                <span class="help-inline"><?php echo $movieimageError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
						<br>
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="crud.php">Back</a>
                        </div>
                    </form>
                </div>      
  </body>
<?php
}
?>