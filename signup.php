<?php
$msg="";
require_once("config.php");
if(isset($_POST['submit'])){
    $username = $con->real_escape_string($_POST['username']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    $cpassword = $con->real_escape_string($_POST['cpassword']);
            if($password == $cpassword){
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $con->query("INSERT INTO user(username,email,password)VALUES('$username', '$email', '$hash')");
                header("location:login.php");
            }else{
                    $msg = "Please check your password if they correspond"; 
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form  method ="post"  class="is-validated container signupform pt-1 mt-2">
    <h3 class="mt-4 text-center">Sign Up</h3>
        <div class="form-group">
                <label for="name">Username</label>
                <input class="form-control" type="Username" name="username" placeholder="e.g Ibrahim Chukwudi" required/>
        </div>
        <div class="form-group">
                <label for="name">Email</label>
                <input class="form-control" type="email" name="email" placeholder="e.g example@gmail.com" required/>
               
        </div>
        <div class="form-group">
                <label for="name">Password</label>
                <input class="form-control" type="password" name="password" placeholder="e.g *******" required/>
              
        </div>
        <div class="form-group">
                <label for="name">Re-enter password</label>
                <input class="form-control" type="password" name="cpassword" placeholder="e.g *******" required/>
               
        </div>
        <div class="custom-control custom-radio custom-control-inline">
                <input type="checkbox" class="custom-control-input custom-control-inline" id="radio1"/>
                <label class="custom-control-label" for="radio1">Male</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
                <input type="checkbox" class="custom-control-input custom-control-inline" id="radio2"/>
                <label class="custom-control-label" for="radio2" >Female</label>
        </div></br>
                <button class="btn btn-primary mt-3  pt-2 pb-2 pr-4 pl-4" id="sub-btn" name="submit">Sign Up</button>
                <?php if($msg != ""){ echo $msg;}  ?>
                <ul class="form-ul">
                        <li>Do you have an account?</li>
                        <li><a href="login.php">Login</a></li>
                </ul>
</form>
</body>
<!--jQUERY-->
<script src="../js/jquery.min.js"></script>
<!--bootstrap script-->
<script src="../js/bootstrap.min.js"></script>
</html>
</html>