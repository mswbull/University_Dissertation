<?php
	session_start();
	if (isset($_SESSION['username'])==false){
		header("Location:login.php");
		exit();
	}
	if ($_SESSION['admin_level'] == 'Full') {
		header("Location:li_index.php");
		exit();
	}
	require "connect.php";
		$admin_id = $_GET['admin_id'];
		$query = "select * from admin WHERE admin_id = '".$admin_id."'";
	$result = @mysql_query($query, $connection)
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
      	{?>
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
				<h2>Administrator</h2>
				<table border="0">
					<tr>
						<th width="175">Username:</th>
						<td width="175"><?=$row['username']?></td>
					</tr>
					<tr>
						<th>Forename:</th>
						<td><?=$row['admin_forename']?></td>
					</tr>
					<tr>
						<th>Surname:</th>
						<td><?=$row['admin_surname']?></td>
					</tr>
					<tr>
						<th>Registered Region:</th>
						<td><?=$row['admin_region']?></td>
					</tr>
					<tr>
						<th>Registered Club:</th>
						<td> <?=$row['admin_club']?></td>
					</tr>
					<tr>
						<th>Administrator Level:</th>
						<td><?=$row['admin_level']?></td>
					</tr>
				</table>
				<p><a href="li_index.php">Return Home</a></p>
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
<?php } ?>
</body>
</html>