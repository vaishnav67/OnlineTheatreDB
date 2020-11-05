<?php
session_start();
include("./includes/header.php");;

if (isset($_GET['id'])){
	
	include("./includes/database.php");
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "select * from screening WHERE m_id=".$_GET['id']."";
	$q = $pdo->prepare($sql);
	$q->execute();
	$rows = $q->fetchAll();

	$sql = "select image from movie WHERE m_id=".$_GET['id']."";
	$q = $pdo->prepare($sql);
	$q->execute();
	$image = $q->fetch();
	Database::disconnect();

	?><h1  style="color:#d9534f"><?php echo$_GET['name']; ?></h1>
	<span style="font-size:30px; font-weight:300; color: black; padding-left:20px">Screening:</span><br><br> 
					 
	<?php
	foreach ($rows as $f){
		?><div class="col-sm-6 col-md-4">

<div class="thumbnail">
			<center>
				<img src="<?php 	echo $image['image'];?>" style="width:40%; height:auto; margin-bottom:5px"><br>
				<div class="caption"><h3><?php echo date("l jS \of F Y", strtotime($f['s_date']));?></h3>
				<h3>18:00pm</h3>
				<p><a href="./seatselection.php?m_id=<?php echo $_GET['id']?>&s_id=<?php echo $f['s_id'] ?>"  style="color:#D11111; font-size:18px">Select seat</a></p>
				</center>
		</div></div><?php 
} }?>
<br><br>
</div>
</body>
</html>