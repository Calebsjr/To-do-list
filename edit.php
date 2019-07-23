<?php
require_once('config.php');
$project = '';
$task_date = '';
$id = 0;
$update = false;
if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$update = true;	
		$result = $con->query("SELECT * FROM task WHERE id=$id") or die($con->error());
			if(count($result)==1){
			$row = $result->fetch_array();
			$project = $row['project'];
			$task_date = $row['task_date'];	
			
		}
		}
?>