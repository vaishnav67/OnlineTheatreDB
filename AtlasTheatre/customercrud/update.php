<?php 
session_start();

if (isset($_SESSION['employee'])){
    
    require '../includes/database.php';
    include ("../includes/adminheader.html");

    $mem_id = null;
    if ( !empty($_GET['mem_id'])) {
        $mem_id = $_REQUEST['mem_id'];
    }
    
    if ( null==$mem_id ) {
            header("Location: ../customercrud/crud.php");
    }
    
    if (!empty($_POST)) 
    {
        // keep track validation errors
        $usernameError = null;
        $passwordError = null;
        $nameError = null;
        $zipcodeError = null;
        
        // keep track post values
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $zipcode = $_POST['zip_code'];
        
        // validate input
        $valid = true;
        if (empty($username)) {
            $usernameError = 'Please enter username';
            $valid = false;
        }
        

        if (empty($password)) {
            $passwordError = 'Please enter password';
            $valid = false;
        }

        if (empty($name)) {
            $nameError = 'Please enter name';
            $valid = false;
        } 

        if (empty($zipcode)) {
            $zipcodeError = 'Please enter zip code';
            $valid = false;
        } 
        
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE customer SET username = ?, password = ?, name = ?, zip_code = ? WHERE mem_id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($username,$password,$name,$zipcode,$mem_id));
            Database::disconnect();
            header("Location: ../customercrud/crud.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM customer where mem_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($mem_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $username = $data['username'];
        $password = $data['password'];
        $name = $data['name'];
        $zipcode = $data['zip_code'];
        Database::disconnect();
    }
?>

<body>
    <div class="container">
    
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Update a customer</h3>
                    </div>
            
                    <form class="form-horizontal" action="update.php?mem_id=<?php echo $mem_id?>" method="post">
                      <div class="control-group <?php echo !empty($usernameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="username" type="text"  placeholder="Username" value="<?php echo !empty($username)?$username:'';?>">
                            <?php if (!empty($usernameError)): ?>
                                <span class="help-inline"><?php echo $usernameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($passwordError)?'error':'';?>">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input name="password" type="text" placeholder="Password" value="<?php echo !empty($password)?$password:'';?>">
                            <?php if (!empty($passwordError)): ?>
                                <span class="help-inline"><?php echo $passwordError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                       <div class="control-group <?php echo !empty($zipcodeError)?'error':'';?>">
                        <label class="control-label">Zip Code</label>
                        <div class="controls">
                            <input name="zip_code" type="text" placeholder="Zip Code" value="<?php echo !empty($zipcode)?$zipcode:'';?>">
                            <?php if (!empty($zipcodeError)): ?>
                                <span class="help-inline"><?php echo $zipcodeError;?></span>
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