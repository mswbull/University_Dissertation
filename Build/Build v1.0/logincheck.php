<?php
	session_start();
	require"connect.php";
	$username=$_GET['username'];
	$password=$_GET['password'];

	$query="select * from admin where username ='".$username.
		"'and password ='".$password."'";

	$result=@mysql_query($query, $connection)
		or die("Unable to perform query<br>$query");

	$row=mysql_fetch_array($result);
	if($row !=null){
			$_SESSION['username'] = $row['username'];
			header("Location: li_index.php");
			exit();
		}
		else{
			header("Location: login.php");
			$message="Username or Password incorrect please try again.";
			header("Location: login.php?li_message=$message");
			exit();
	}
?>