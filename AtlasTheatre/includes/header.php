<header>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="author" content="Maria">
	<link rel="shortcut icon" href= "./images/favicon.png">
	<link rel="stylesheet" href="./css/bootstrap.css" >
	<link rel="stylesheet" href="./css/style.css">
    <title>Atlas Theatre</title>
</header>

  <body>
    <div class="container">
		    <!-- Navigation Bar  -->
           <nav class="navbar navbar-default">
					<a href="index.php"><img  class="navbar-brand" src="./images/favicon.png"></a>
					<a class="navbar-brand" href="index.php">HOME</a>
					<ul class="nav navbar-nav">
						 <form action="productions.php" method="POST">
							<input class = "boton" type="submit" name="Movies" value="MOVIES">
						 </form>
					 </ul>
					 <a href="./customercrud/create.php" class="navbar-brand navbar-right"> NEW USER </a>
					 <?php if(isset($_SESSION['employee'])){?>
					<a href="./logout.php" class="navbar-brand navbar-right"> EMPLOYEE LOGOUT </a>
					<?php }else{?>
					<a href="./login.php" class="navbar-brand navbar-right"> EMPLOYEE LOGIN </a>
					<?php } ?>
					<?php if(isset($_SESSION['customer'])){?>
					<a href="./memlogout.php" class="navbar-brand navbar-right" style="padding-left:50px"> MEMBER LOGOUT </a>
					<?php }else{?>
					<a href="./memlogin.php" class="navbar-brand navbar-right" style="padding-left:50px">MEMBER LOGIN </a>
						<?php } ?>
					<a href="shoppingbasket.php"><img  class="navbar-brand navbar-right" src="./images/shopping_bag.png"></a>
                   <div class="col-lg-6" style="text-align:right">
						<form action="searcher.php" method="get">
							<input  type="text" name="terms"  size="30px">
							<input class="btn btn-default" type="submit" name="searcher" value="SEARCH MOVIE">
						</form>
					</div>        
			</nav>
			
	
			<a href="index.php"><div class="thumbnail" style="border:none"><img src="./images/logo.png"></div></a>