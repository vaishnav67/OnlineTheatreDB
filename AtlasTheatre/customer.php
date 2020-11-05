<?php
session_start();
include("./includes/header.php");

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['someAction']))
    {
			header("Location: ./booking.php");
}

?>

<!-- Customer form -->

	<div class="col-lg-7" style="padding-left:50px">
        <h1 style="color:#d9534f">Customer form</h1>
        <h2 style="color:#222222">Are you sure you want to purchase?</h2>
    <form action="customer.php" method="post">     
            <div class="form-actions">
                <button type="submit" name="someAction" class="btn btn-danger"  style="font-size:18px">BOOK TICKETS</button>
            </div>
     </form>
</div>

<div class="col-lg-5">
	<h1 style="color:#d9534f">Tickets to purchase</h1><br>
<?php
if(isset($_SESSION['basket'])) {
			
	$data = $_SESSION ['basket'];
	$total = 0;
	
	for ($i=0; $i<count($data); $i++){
		?>
		<div class="col-lg-6">
			<center><img src = "<?php echo $data[$i]['image'];?>" width="120px"> <br>
			<span style="font-size:23px; font-weight:400; color:black"><?php echo $data[$i]['m_title'];?></span><br>
			<span style="font-size:20px; font-weight:400; color:black;font-style:italic"><?php echo date("l jS \of F Y", strtotime($data[$i]['s_date']));?></span><br>
			<span style="font-size:20px; font-weight:400; color: black">18:00pm</span><br>
			<span style="font-size:20px; font-weight:400; color: black">Seat: <?php echo $data[$i]['se_no'] ?></span><br>
			<span style="font-size:20px; font-weight:600; color:#D11111">Rs <?php echo $data[$i]['price'];?></span><br><br></center><br>
		</div>
		<?php
		$total += $data[$i]['price'];
		}
}
?>
<span style="font-size:20px; font-weight:600; color:#D11111">Total: £<?php echo $total;?></span><br><br></center><br>
</div>
                 
</div>
</body>
</html>