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
				<p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Customer ID</th>
		                  <th>Customer Username</th>
		                  <th>Customer Password</th>
		                  <th>Customer Name</th>
		                  <th>Zip Code</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customer ORDER BY mem_id ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
						   		echo '<td>'. $row['mem_id'] . '</td>';
							   	echo '<td>'. $row['username'] . '</td>';
							   	echo '<td>'. $row['password'] . '</td>';
							   	echo '<td>'. $row['name'] . '</td>';
							   	echo '<td>'. $row['zip_code'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="../customercrud/read.php?mem_id='.$row['mem_id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="../customercrud/update.php?mem_id='.$row['mem_id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="../customercrud/delete.php?mem_id='.$row['mem_id'].'">Delete</a>';
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