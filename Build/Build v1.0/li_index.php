<?php
	session_start();
	if (isset($_SESSION['username'])==false){
		header("Location:login.php");
		exit();
	}
	require "connect.php";
		$query = "select * from admin WHERE username = '".$_SESSION['username']."'";
		$result = mysql_query($query, $connection)
		or die ("Unable to perform query<br>$query");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="Author" content="Matthew Bull" />
	<meta name="keywords" content="Rowing, Coastal Rowing, Regatta, Amateur Rowing Association, ARA, Hants & Dorset, H&DARA, Coast, CARA, West of England, WEARA, South Coast Championship" />
	<meta name="description" content="The Coastal Rowing South Coast Championship Regatta" />
	<meta name="robots" content="all" />
	<title>Dorney South Coast Championships</title>
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
	<?php
	      	while($row = mysql_fetch_array($result))
	      	{
	?>
	<? 		$admin_level = $row['admin_level'];
			$_SESSION['admin_level'] = $row['admin_level'];
			if ($admin_level == 'Full') {
	?>
	<div id="contain">

		<div id="header">
		</div>

		<div id="navbar">
			|<a href="li_index.php">Home</a> |
			<a href="registeredclubscrews.php">Registered Clubs / Crews</a> |
			<a href="programmedraw.php">Programme / Draw</a> |
			<a href="resultstimes.php">Results / Times</a> |
			<a href="reports.php">Reports</a> |
			<a href="contacts.php">Contacts</a> |
		</div>

		<div id="content">
				<h2>Welcome <?=$row['admin_forename']?></h2>
				<p>Please select a link below to add or modify regatta information.</p>
				<table border="0">
					<tr>
						<td width="150">Adminstator Accounts</td>
						<td><a href="addnewadmin.php">[Add]</a> - <a href="viewalladmin.php">[View All]</a></td>
					</tr>
					<tr>
						<td>Clubs / Crews</td>
						<td><a href="#">[Add]</a> - <a href="#">[View All]</a></td>
					</tr>
					<tr>
						<td>Programme / Draw</td>
						<td><a href="#">[Add]</a> - <a href="#">[View All]</a></td>
					</tr>
					<tr>
						<td>Results / Times</td>
						<td><a href="#">[Add]</a> - <a href="#">[View All]</a></td>
					</tr>
					<tr>
						<td>Reports</td>
						<td><a href="#">[Add]</a> - <a href="#">[View All]</a></td>
					</tr>
				</table>
				<br />
		</div>

		<div id="footer">
			<a href="logout.php">Admin Logout</a>
		</div>

	</div>
    <div id="footer-nav">
			|<a href="li_index.php">Home</a> |
			<a href="registeredclubscrews.php">Registered Clubs / Crews</a> |
			<a href="programmedraw.php">Programme / Draw</a> |
			<a href="resultstimes.php">Results / Times</a> |
			<a href="reports.php">Reports</a> |
			<a href="contacts.php">Contacts</a> |<br />
	</div>

<? } else { ?>

<div id="contain">

		<div id="header">
		</div>

		<div id="navbar">
			|<a href="li_index.php">Home</a> |
			<a href="registeredclubscrews.php">Registered Clubs / Crews</a> |
			<a href="programmedraw.php">Programme / Draw</a> |
			<a href="resultstimes.php">Results / Times</a> |
			<a href="reports.php">Reports</a> |
			<a href="contacts.php">Contacts</a> |
		</div>

		<div id="content">
				<h2>Welcome <?=$row['admin_forename']?></h2>
				<p>Please select a link below to view, edit or delete information.</p>
				<table border="0">
					<tr>
						<td width="150">Adminstator Account</td>
						<td></td>
						<td><a href="editclubadmin.php?admin_id=<?=$row['admin_id']?>">[edit]</a> - <a href="viewclubadmin.php?admin_id=<?=$row['admin_id']?>">[view]</a></td>
					</tr>
					<tr>
						<td>Register Crews</td>
						<td><a href="#">[Add]</a> - </td>
						<td><a href="#">[Edit]</a> - <a href="#">[View]</a></td>
					</tr>
				</table>
				<br />
		</div>

		<div id="footer">
			<a href="logout.php">Admin Logout</a>
		</div>

	</div>
    <div id="footer-nav">
			|<a href="li_index.php">Home</a> |
			<a href="registeredclubscrews.php">Registered Clubs / Crews</a> |
			<a href="programmedraw.php">Programme / Draw</a> |
			<a href="resultstimes.php">Results / Times</a> |
			<a href="reports.php">Reports</a> |
			<a href="contacts.php">Contacts</a> |<br />
	</div>

<? } } ?>

</body>
</html>