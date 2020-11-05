
<?php
session_start();
include ("./includes/header.php"); ?>

 <div id="loginbox" style="margin-top:-15px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">               
        <div class="panel-heading">
             <h1 style="color:#d9534f">Member Login</h1>
		</div>     

        <div style="padding-top:30px" class="panel-body" >

        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
        <form action="memlogin.php" method= "POST"  class="form-horizontal" role="form">                      
			<div style="margin-bottom: 25px" class="input-group">
				 <span class="input-group-addon"><img src="./images/user.png"></span>
				<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
			</div>
									
			<div style="margin-bottom: 25px" class="input-group">
				 <span class="input-group-addon"><img src="./images/lock.png"></span>
				 <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
			 </div>
										
			<div style="margin-top:10px" class="form-group">
				<div class="col-sm-12 controls">
					<input type="submit" id="btn-login" value="LOGIN" class="btn btn-danger" style="font-size:18px">
				</div>
			</div>  
		</form>     
<?php

if(isset($_POST["username"]) && isset ($_POST["password"]) ){

$username = $_POST["username"];
$password = $_POST["password"];

include("./includes/database.php");
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM customer WHERE username= :username AND password= :password";
$q = $pdo->prepare($sql);
$q->bindParam(':username', $username, PDO::PARAM_STR);
$q->bindParam(':password', $password, PDO::PARAM_STR);
$q->execute();

$total = $q-> rowCount();

if ($total) {
        $_SESSION['customer'] = true;
        foreach ($q as $f){
        $_SESSION['customer'] = $f['mem_id'];
    }
    header("Location: ./index.php");
}

else { echo '<span style="font-size:20px; font-weight:600; color:#D11111">Incorrect username or password</span>';

}

}