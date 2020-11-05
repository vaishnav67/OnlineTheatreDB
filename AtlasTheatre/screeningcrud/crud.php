<?php
session_start();

if (isset($_SESSION['employee'])){
	
	require '../includes/database.php';
	include ("../includes/adminheader.html");
?>
<body>
    <div class="container">
    		<div class="row">
    				<h1  style="color:#d9534f; font-weight:200">screening CRUD</h1><br>
				<center><a href="../index.php"  style="font-size:22px; font-weight:400; color:#D11111">Go to the Home Page</a></center>
    		</div>
			<div class="row">
				<p>
					<a href="perfcreate.php" class="btn btn-success">Create</a>
				</p>
				
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Screening ID</th>
		                  <th>Screening Date</th>
		                  <th>Movie Name</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 

					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM screening ORDER BY s_id ASC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
						   		echo '<td>'. $row['s_id'] . '</td>';
							   	echo '<td>'. $row['s_date'] . '</td>';
							   	echo '<td>'. $row['m_id'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn" href="../screeningcrud/perfread.php?s_id='.$row['s_id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="../screeningcrud/perfupdate.php?s_id='.$row['s_id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="../screeningcrud/perfdelete.php?s_id='.$row['s_id'].'">Delete</a>';
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