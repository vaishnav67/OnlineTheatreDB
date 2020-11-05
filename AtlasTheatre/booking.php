<?php
session_start();
include("./includes/header.php");
include("./includes/database.php");

if ( isset($_SESSION['basket']) && isset ($_SESSION['customer']) ){
	
	$arreglo = $_SESSION['basket'];
	$customer = $_SESSION['customer'];

	$count = 0;
	$message = true;

	for($i=0; $i<count($arreglo);$i++){
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * from reservation WHERE s_id=".$arreglo[$i]['Id']." AND se_id= :var";
		$q = $pdo->prepare($sql);
		$q->bindParam(':var', $arreglo[$i]['se_no'], PDO::PARAM_STR);
		$q->execute();
		$same =  $q-> rowCount();

		if ($same){
				if ($message) {?> <div class="row"><div class="col-lg-12"><span style="font-size:23px; font-weight:400; color:black">Sorry but the following tickets weren't booked because someone else booked them while you were browsing the site.<br></span><br></div></div><?php
					$message = false;}?>
			
				<div class="col-lg-4">
					<center><img src = "<?php echo $arreglo[$i]['image'];?>" width="120px"> <br>
						<span style="font-size:23px; font-weight:400; color:black"><?php echo $arreglo[$i]['m_name'];?></span><br>
						<span style="font-size:20px; font-weight:400; color:black;font-style:italic"><?php echo date("l jS \of F Y", strtotime($arreglo[$i]['s_date']));?></span><br>
						<span style="font-size:20px; font-weight:400; color: black">18:00pm</span><br>
						<span style="font-size:20px; font-weight:400; color: black">Seat: <?php echo $arreglo[$i]['se_no'] ?></span><br>
						<span style="font-size:20px; font-weight:600; color:#D11111">Rs <?php echo $arreglo[$i]['price'];?></span></center><br><br>
				</div><?php
			} 
			else $count++;
	}
	
	if($count){
		?><div class="col-lg-12"><div class="row"> </div><span style="font-size:40px; font-weight:300; color:#D11111">Purchase summary<br></span><br>
		<span style="font-size:23px; font-weight:400; color:black">Your tickets have been successfully booked! <br>Now you can collect them at the theatre showing your ticket ID. An email has been also sent to you with the details of your purchase.<br>THANK YOU!<br><br></span>
		</div><?php
	
		$customernumber = $pdo-> lastInsertId();
		
		for($i=0; $i<count($arreglo);$i++){
			
			if(!$same)
			{
				$sql = "insert into reservation (res_id,e_id,res_d, mem_id, s_id, se_id) values(
				'',
				'".$_SESSION['employee']."',
				NOW(),
				'".$_SESSION['customer']."',	
				'".$arreglo[$i]['Id']."',
				'')";
				
				$q = $pdo->prepare($sql);
				$q->execute();
				
				$ticketreference = $arreglo[$i]['Id'];
				$ticketreference .= $arreglo[$i]['se_no'];
				
				$bookingnumber =  $pdo-> lastInsertId();
				
				$sql = "insert into seat (se_id, se_no) values(
				'',
				'".$arreglo[$i]['se_no']."')";
				
				$q = $pdo->prepare($sql);
				$q->execute();
				Database::disconnect();
				?>
				
				<div class="col-lg-4">
						<center><img src = "<?php echo $arreglo[$i]['image'];?>" width="120px"> <br>
						<span style="font-size:23px; font-weight:400; color:black"><?php echo $arreglo[$i]['m_title'];?></span><br>
						<span style="font-size:20px; font-weight:400; color:black;font-style:italic"><?php echo date("l jS \of F Y", strtotime($arreglo[$i]['s_date']));?></span><br>
						<span style="font-size:20px; font-weight:400; color: black">18:00pm</span><br>
						<span style="font-size:20px; font-weight:400; color: black">Seat: <?php echo $arreglo[$i]['se_no'] ?></span><br>
						<span style="font-size:20px; font-weight:600; color:#D11111"><img src="http://icons.iconarchive.com/icons/umar123/build/48/0025-Ticket-icon.png" width="40px">Ticket ID: <?php echo $ticketreference;?></span><br><br></center><br>
				</div><?php
				unset($_SESSION['basket']);
			} 
		} 
		echo '<div class="row"></div><center><a href="./index.php"  style="font-size:22px; font-weight:400; color:#D11111">Go to the Home Page</a></center>';
	}
}
else
{
	echo '<span style="font-size:23px; font-weight:400; color:black">You have not signed in!</span>
		</div>';
}

