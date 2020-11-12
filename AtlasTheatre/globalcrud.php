<?php
session_start();
include("./includes/header.php");

if (isset($_SESSION['employee'])) { 
echo '<center style="margin-left:-40px">
     <h1 style="color:#d9534f">CRUD - Movie and Screening</h1><br><br>
     <a class="btn btn-danger" href="./moviecrud/crud.php" role="button"  style="font-size:18px">MOVIE CRUD   &raquo;</a><br><br>
     <a class="btn btn-success" href="./screeningcrud/crud.php" role="button"  style="font-size:18px">SCREENING CRUD   &raquo;</a><br><br>
     <a class="btn btn-danger" href="./customercrud/crud.php" role="button"  style="font-size:18px">CUSTOMER CRUD   &raquo;</a><br><br>
     <a class="btn btn-success" href="./theatreset/set.php" role="button"  style="font-size:18px">THEATRE SET   &raquo;
	 </center>';

}

else { echo '<center><span style="font-size:20px; font-weight:600; color:#D11111">Restricted area. Only admins can access it.</span></center>';}
?>
</div>
</body>
</html>