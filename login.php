<?php
session_start();
$msg="";
require_once("config.php");
if(isset($_POST['login'])){
    $username = $con->real_escape_string($_POST['username']);
    $password = $con->real_escape_string($_POST['password']);
    $sql = $con->query("SELECT id, password FROM user WHERE username = '$username'");
		if($sql->num_rows > 0){
            $_SESSION['username']= $username;
			$data  = $sql->fetch_array();
			
			if(password_verify($password, $data['password'])){
				header("location:index.php");
			}else{
			$msg = "Please check your inputs";
		}
		}else{
			$msg = "Please check your inputs";
		}
 	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>signup.php</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<!--BOOTSTRAP-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<!--BOOTSTRAP GRID-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<form class="is-validated container loginform pt-1 mt-2" method="post">
    <h3 class="mt-4 mb-4 text-center">Login</h3>
        <div class="form-group">
                <label for="name">Username</label>
                <input class="form-control" type="Username" name="username" placeholder="e.g Ekong Tena" required/>
               
        </div>
        <div class="form-group">
                <label for="name">Password</label>
                <input class="form-control" type="password" name="password" placeholder="e.g *******" required/>
              
        </div>
        <div class="form-group">
                <label for="name">Re-enter password</label>
                <input class="form-control" type="password" name="cpassword" placeholder="e.g *******" required/>     
        </div>
                <button class="btn btn-primary  pt-2 pb-2 pr-4 pl-4 mt-4" id="sub-btn" name="login">Sign Up</button>
                <?php if($msg != ""){ echo $msg;}  ?>
                <ul class="form-ul">
                        <li>Don't have account?</li>
                        <li><a href="signup.php">Signup</a></li>
                </ul>
</form>
</body>
<!--jQUERY-->
<script src="../js/jquery.min.js"></script>
<!--bootstrap script-->
<script src="../js/bootstrap.min.js"></script>
</html>
</html>