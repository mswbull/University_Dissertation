<?php
	require "connect.php";
	$username=$_GET['username'];
	$password=$_GET['password'];
	$admin_forename=$_GET['forename'];
	$admin_surname=$_GET['surname'];
	$admin_region=$_GET['region'];
	$admin_club=$_GET['club'];
	$admin_level=$_GET['level'];
	$query="insert into admin values(0,'".$username."', '".$password."', '".$admin_forename."', '".$admin_surname."', '".$admin_region."', '".$admin_club."', '".$admin_level."')";
	$result=@mysql_query($query,$connection)
		or die ("Unable to perform query<br>$query");
	header("Location: li_index.php");
	exit();
?>