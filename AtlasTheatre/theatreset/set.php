<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");
?>

<body>
    <div class="container">
    		<div class="row"><br>
    			<h1  style="color:#d9534f; font-weight:200">Customer CRUD</h1><br>
				<center><a href="../index.php"  style="font-size:22px; font-weight:400; color:#D11111">Go to the Home Page</a></center>
    		</div>
			<div class="row">
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Theatre ID</th>
		                  <th>Location</th>
		                  <th>Manager ID</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM theatre ORDER BY t_id ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
						   		echo '<td>'. $row['t_id'] . '</td>';
							   	echo '<td>'. $row['location'] . '</td>';
							   	echo '<td>'. $row['mgr_id'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="../theatreset/confirm.php?t_id='.$row['t_id'].'">Set</a>';
							   	echo '&nbsp;';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
<?php
}
?>