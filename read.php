<?php
session_start();
require_once('config.php');
if(isset($_POST['done'])){

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>create.php</title>
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
 <!--Nav in bs4-->
    <nav class="navbar navbar-expand-md bg-primary container shadow-sm" id="nav">
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fa fa-check-square" style="font-size: 30px;"></i> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white mt-1"  href="#" style="font-weight: bolder;">All Lists</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link dropdown-toggle text-white mt-1" id="carat" data-toggle="dropdown" href="#"></a>
            <div class="dropdown-menu dropdown-menu bg-primary " style="width: 220px !important; margin-top: -60px !important; ">
                    <a class="dropdown-item text-white  pt-2 pb-2" href="#" style="font-size: 15px !important;">Task List </a>
                    <a class="dropdown-item text-white pt-2 pb-2" href="#" style="font-size: 14px !important;">Add in Batch Mode</a>
                    <a class="dropdown-item text-white pt-2 pb-2" href="#" style="font-size: 14px !important;">Remove Ads</a>
                    <a class="dropdown-item text-white pt-2 pb-2" href="#" style="font-size: 14px !important;">Settings</a>
                </div>
        </li> 
        </ul>
        <ul class="navbar-nav search">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" ><i style="font-size:23px !important;" class="fa fa-search" style="font-size: 30px;"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" data-toggle="dropdown" href="#" style="padding-left:30px !important;"><i class="fa fa-ellipsis-v" style="font-size: 27px;"></i></a>
                    <div class="dropdown-menu dropdown-menu-right bg-primary " style="width: 220px !important; margin-top: -60px !important;">
                    <a class="dropdown-item text-white  pt-2 pb-2" href="#" style="font-size: 15px !important;">Task List </a>
                    <a class="dropdown-item text-white pt-2 pb-2" href="#" style="font-size: 14px !important;">Add in Batch Mode</a>
                    <a class="dropdown-item text-white pt-2 pb-2" href="#" style="font-size: 14px !important;">Remove Ads</a>
                    <a class="dropdown-item text-white pt-2 pb-2" href="#" style="font-size: 14px !important;">Settings</a>
                </div>
                </li>
        </ul>
    </div> 
    </nav>
    <div class="container bg-white body shadow-sm">
		<?php require_once('config.php'); 
			  require_once('edit.php'); 
			$result =$con->query("SELECT * FROM task")or die($con->error);
			//pre_r($result);
		?>

			<div class="container">
				<table class="table">
					<thead class="bg-light text-primary shadow">
						<tr>
							<th>Number</th>
							<th>Task Added</th>
							<th>Date_added</th>
							<th>Username</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<?php 
						while($row = $result->fetch_assoc()):  ?>
						<tr class="shadow-sm">
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['project']; ?></td>
							<td><?php echo $row['task_date']; ?></td>
							<td><?php echo $row['username']; ?></td>

							<td>
								<a href="insert.php?edit=<?php echo $row['id']; ?>"><button type="submit" class="btn btn-info" name="edit">Edit</button></a>
								<a href="delete.php?delete=<?php echo $row['id']; ?>"><button type="submit" class="btn btn-danger" name="delete">Delete</button></a>
							</td>
						</tr>
					<?php endwhile; ?>
				</table>
			</div>

		<?php
			function pre_r($array){
			echo "<pre>";
			print_r($array);
			echo "</pre>";
		}

		?>
    </div>
</body>
<!--jQUERY-->
<script src="../js/jquery.min.js"></script>
<!--bootstrap script-->
<script src="../js/bootstrap.min.js"></script>
</html>
  