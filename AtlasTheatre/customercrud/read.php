<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");

    $id = null;
    if ( !empty($_GET['m_id'])) {
        $movieid = $_REQUEST['m_id'];
    }
     
    if ( null==$movieid ) {
        	header("Location: ../moviecrud/crud.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM movie where m_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($movieid));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a movie</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Movie Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['m_title'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Movie Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['m_date'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Movie Price</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['price'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Movie Image</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['image'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="crud.php">Back</a>
                       </div>
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
<?php
}
?>