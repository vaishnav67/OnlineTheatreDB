<?php 
session_start();
	include("./includes/header.php");
	include("./includes/database.php");
	
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM movie ORDER BY m_id DESC LIMIT 2";
	$q = $pdo->prepare($sql);
	$q->execute();
	$rows = $q->fetchAll();
	Database::disconnect();
?>
	<!-- New Performances  -->
	<div class="col-lg-6" style="margin-left:-12px">
	<h1 style="color:#d9534f">Latest Movies</h1><br>
			
<?php
	foreach ($rows as $f) {
	?>
		<div class="col-sm-6">
			<div class="thumbnail">
			<center>
                <a href="./screening.php?id=<?php echo $f['m_id'] ?>&name=<?php echo $f['m_title']?>"><img src="<?php echo $f['image'];?>" style="width:40%; height:auto; margin-bottom:5px"></a>
				<div class="caption">
					<h3><?php echo $f['m_title'];?></h3>		
					<h3>Rs <?php echo $f['price'];?></h3>
					<p>
						<a href="./screening.php?id=<?php echo $f['m_id'] ?>&name=<?php echo $f['m_title']?>" style="color:#D11111; font-size:18px">View Movies</a>
					</p>
				</div>
			</center>
         </div>
	</div>
	<?php
	}
?>
	<a class="btn btn-danger" href="latestproductions.php" role="button"  style="font-size:18px; margin-left:15px">VIEW MORE  &raquo;</a>
	<br><br><br>
</div>
</body>
</html>