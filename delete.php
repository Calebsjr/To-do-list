<?php
require 'config.php';
if(isset($_GET['delete'])){
			$id = $_GET['delete'];
		$con->query("DELETE FROM task WHERE id=$id") or die($mysqli->error());
		header("location:read.php");
			
		}
?>