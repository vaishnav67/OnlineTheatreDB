<?php
session_start();
include("./includes/header.php");;
include("./includes/database.php");
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * from movie";
$q = $pdo->prepare($sql);
$q->execute();
$rows = $q->fetchAll();
Database::disconnect();

?>
<div class="row">

<?php
foreach ($rows as $f){
	?>
<div class="col-sm-6 col-md-3">

<div class="thumbnail"> 
		<center>
                <a href="./screening.php?id=<?php echo $f['m_id'] ?>&name=<?php echo $f['m_title']?>"><img src="<?php echo $f['image'];?>" style="width:40%; height:auto; margin-bottom:5px"></a>
			<div class="caption"><h3><?php echo $f['m_title'];?></h3>		
                           <h3>Rs <?php echo $f['price'];?></h3>
			        <p><a href="./screening.php?id=<?php echo $f['m_id'] ?>&name=<?php echo $f['m_title']?>" style="color:#D11111; font-size:18px">View Screening</a></p>
                               </div>
		</center>
         </div>
</div>
	<?php
}?> 

</div>
</div>
<br><br>
</div>
</body>
</html>