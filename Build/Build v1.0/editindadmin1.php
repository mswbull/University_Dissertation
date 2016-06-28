<?php
	session_start();
	if (isset($_SESSION['username'])==false){
		header("Location:login.php");
		exit();
	}
	if ($_SESSION['admin_level'] == 'Club') {
		header("Location:li_index.php");
		exit();
	}

	require "connect.php";
	$admin_id=$_GET['admin_id'];
	$username=$_GET['username'];
	$password=$_GET['password'];
	$admin_forename=$_GET['forename'];
	$admin_surname=$_GET['surname'];
	$admin_region=$_GET['region'];
	$admin_club=$_GET['club'];
	$admin_level=$_GET['level'];

	$query="update admin set username ='".$username."', password = '".$password."', admin_forename = '".$admin_forename."', admin_surname = '".$admin_surname."', admin_region = '".$admin_region."', admin_club = '".$admin_club."', admin_level = '".$admin_level."' where admin_id = '".$admin_id."'";
	$result=@mysql_query($query,$connection)
		or die ("Unable to perform query<br>$query");
	header("Location:viewalladmin.php");
	$message="You have successfully updated the administrator.";
	header("Location:viewalladmin.php?edit_message=$message");
	exit();
?>