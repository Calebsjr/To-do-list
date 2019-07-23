<?php
session_start();
if(isset($_SESSION['username'])){
echo 'Your are on your Todo list'. ' '. '<b>'.$_SESSION['username'].'</b>';
}
$msg="";
require_once('config.php');
if(isset($_POST['done'])){
	$project = $con->real_escape_string($_POST['project']);
	$task_date = $con->real_escape_string($_POST['task_date']);

	if($project != "" && $task_date != ""){
		$con->query("INSERT INTO task(project, task_date, username)VALUES('$project','$task_date')");
			header("location:insert.php");
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<?php require 'edit.php'; 
		  require 'update.php';

	?>
 <!--New Task Div-->
    <nav class="navbar navbar-expand-md bg-primary container shadow-sm" id="newTask">
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="#"><i class="fa fa-arrow-left" style="font-size: 20px;"></i> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white mt-1"  href="#" style="font-weight: bolder; margin-top: -2px !important;">New Task</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link  text-white mt-1"  href="#"><i id="check" style="font-size: 25px; padding-left: 295px !important; margin-top: -10px !important;" class="fa fa-check"></i> </a>
            </li> 
            </ul>
        </div> 
        </nav>
            <div class="body2">
            	<form class="form-group" method="post" action="insert.php">
            		<input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label class="label">What is to be done</label><br>
                    <input type="text" name="project" class="" value="<?php echo $project; ?>" placeholder="Enter Task Here"/><i style="padding-left: 15px !important;" class="fa fa-microphone text-primary"></i><br>
                    <label class="label">Due Date</label><br>
                    <input type="date" name="task_date" class="form-control" value="<?php echo $task_date; ?>"  placeholder="Date not set"/><i style="padding-left: 15px !important;" class="fa fa-calendar text-primary"></i><br>
                    
                        <?php if($msg != ""){ echo $msg;}  ?>
                    	<?php 
					if($update == true):
					 ?>
					 	<button type="submit" class="btn btn-info" name="update">Update</button>
					<?php else: ?>
						<button class="btn btn-primary ml-4" name="done">Add task</button>
					<?php endif; ?>    
		        </form>
		                <a href="read.php">View Task Added</a>
            </div>
</body>
<!--jQUERY-->
<script src="../js/jquery.min.js"></script>
<!--bootstrap script-->
<script src="../js/bootstrap.min.js"></script>
</html>
