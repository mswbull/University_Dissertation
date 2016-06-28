<?php
	require "connect.php";
	$admin_id = $_GET['admin_id'];
	$query = "delete from admin where admin_id = ".$admin_id;
	$result = @mysql_query($query, $connection)
		or die ("Unable to perform query<br>$query");
	header("Location: viewalladmin.php");
	$message="You have successfully deleted the administrator.";
	header("Location:viewalladmin.php?delete_message=$message");
	exit();
?>