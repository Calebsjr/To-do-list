<?php
require 'config.php';
if(isset($_POST['update'])){
			$id = $_POST['id'];
			$project = $_POST['project'];
			$task_date = $_POST['task_date'];
			$con->query("UPDATE task set project='$project', task_date='$task_date' WHERE id=$id") or die ($con->error());
		header("location:insert.php");
		
		}
?>