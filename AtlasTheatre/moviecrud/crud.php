<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");
?>

<body>
    <div class="container">
    		<div class="row"><br>
    			<h1  style="color:#d9534f; font-weight:200">Movie CRUD</h1><br>
				<center><a href="../index.php"  style="font-size:22px; font-weight:400; color:#D11111">Go to the Home Page</a></center>
    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Movie ID</th>
		                  <th>Movie Name</th>
		                  <th>Movie Date</th>
		                  <th>Movie Price</th>
		                  <th>Movie Image</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM movie ORDER BY m_id ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
						   		echo '<td>'. $row['m_id'] . '</td>';
							   	echo '<td>'. $row['m_title'] . '</td>';
							   	echo '<td>'. $row['m_date'] . '</td>';
							   	echo '<td>'. $row['price'] . '</td>';
							   	echo '<td><img src="'. $row['image'] . '" width="100px"></td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="../moviecrud/read.php?m_id='.$row['m_id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="../moviecrud/update.php?m_id='.$row['m_id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="../moviecrud/delete.php?m_id='.$row['m_id'].'">Delete</a>';
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