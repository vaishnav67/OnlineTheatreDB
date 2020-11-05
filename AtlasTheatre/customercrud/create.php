<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");	
	
    if ( !empty($_POST)) {
        // keep track validation errors
        $unError = null;
        $psError = null;
        $nameError = null;
        $zcError = null;
         
        // keep track post values
        $un = $_POST['username'];
        $ps = $_POST['password'];
        $name = $_POST['name'];
        $zc = $_POST['zipcode'];
         
        // validate input
        $valid = true;
        if (empty($un)) {
            $unError = 'Please enter username';
            $valid = false;
        }
         

        if (empty($ps)) {
            $psError = 'Please enter password';
            $valid = false;
        } 

        if (empty($name)) {
            $nameError = 'Please enter real name';
            $valid = false;
        } 

        if (empty($zc)) {
            $zcError = 'Please enter zip code';
            $valid = false;
        } 
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO customer (username,password,name,zip_code) values(?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($un,$ps,$name,$zc));
            Database::disconnect();
            header("Location: ../customercrud/crud.php");
        }
    }
?>

<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create new user</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($unError)?'error':'';?>">
                        <label class="control-label">Username</label>
                        <div class="controls">
                            <input name="username" type="text"  placeholder="Username" value="<?php echo !empty($un)?$un:'';?>">
                            <?php if (!empty($unError)): ?>
                                <span class="help-inline"><?php echo $unError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($psError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="text" placeholder="Password" value="<?php echo !empty($ps)?$ps:'';?>">
                            <?php if (!empty($psError)): ?>
                                <span class="help-inline"><?php echo $psError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Full Name</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Full Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($zcError)?'error':'';?>">
                        <label class="control-label">Zip Code</label>
                        <div class="controls">
                            <input name="zipcode" type="text" placeholder="Zip Code" value="<?php echo !empty($zc)?$zc:'';?>">
                            <?php if (!empty($zcError)): ?>
                                <span class="help-inline"><?php echo $zcError;?></span>
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