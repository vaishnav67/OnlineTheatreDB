<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $screeningdateError = null;
        $m_idError = null;
         
        // keep track post values
        $screeningdate = $_POST['s_date'];
        $m_id = $_POST['m_id'];
         
        // validate input
        $valid = true;
        if (empty($screeningdate)) {
            $screeningdateError = 'Please enter Performace Date';
            $valid = false;
        }

         $valid = true;
        if (empty($m_id)) {
            $m_idError = 'Please enter Production Name';
            $valid = false;
        }


        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO screening (s_date, m_id) values(?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($screeningdate, $m_id));
            Database::disconnect();
            header("Location: ../screeningcrud/crud.php");
        }
    }
?>


<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a screening</h3>
                    </div>
             
                    <form class="form-horizontal" action="perfcreate.php" method="post">
                      <div class="control-group <?php echo !empty($screeningdateError)?'error':'';?>">
                        <label class="control-label">Performace Date</label>
                        <div class="controls">
                            <input name="s_date" type="text"  placeholder="screening Date" value="<?php echo !empty($screeningdate)?$screeningdate:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($m_idError)?'error':'';?>">
                        <label class="control-label">Performace Name</label>
                        <div class="controls">
                            <input name="m_id" type="text"  placeholder="m_id" value="<?php echo !empty($m_id)?$m_id:'';?>">
                            <?php if (!empty($m_idError)): ?>
                                <span class="help-inline"><?php echo $m_idError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="form-actions">
            <br>
                          <button type="submit" class="btn btn-success">Create</button>
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
