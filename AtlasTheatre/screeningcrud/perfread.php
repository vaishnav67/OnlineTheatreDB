<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");

    $id = null;
    if ( !empty($_GET['s_id'])) {
        $s_id = $_REQUEST['s_id'];
    }
     
    if ( null==$s_id ) {
          header("Location: ../screeningcrud/crud.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM screening where s_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($s_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Read a screening</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">screening Date</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['s_date'];?>
                            </label>
                        </div>
                      </div>
                      <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Production Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['m_id'];?>
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