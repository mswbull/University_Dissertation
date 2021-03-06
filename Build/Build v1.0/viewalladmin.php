<?php
	session_start();
	if (isset($_SESSION['username'])==false){
		header("Location:index.php");
		exit();
	}
	if ($_SESSION['admin_level'] == 'Club') {
		header("Location:li_index.php");
		exit();
	}
	require "connect.php";
	$query = "select * from admin";
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
				<h2>View Administrators</h2>
				<p style= "font-weight: bold; color: maroon"><?php if(isset($_GET['edit_message'])) { ?> <?php echo $_GET['edit_message']; } ?></p>
				<p style= "font-weight: bold; color: maroon"><?php if(isset($_GET['delete_message'])) { ?> <?php echo $_GET['delete_message']; } ?></p>
				<table border="0">
					<tr>
						<th width="100">Name</td>
						<th width="100">Username</td>
						<th width="150">Registered Region</td>
						<th width="150">Registered Club</td>
						<th width="100">Admin Level</td>
						<th>Control</td>
					</tr>
					<?php while($row = mysql_fetch_array($result)) {?>
					<tr>
						<td><?=$row['admin_forename']?> <?=$row['admin_surname']?></td>
						<td><?=$row['username']?></td>
						<td><?=$row['admin_region']?></td>
						<td><?=$row['admin_club']?></td>
						<td><?=$row['admin_level']?></td>
						<td><a href="editindadmin.php?admin_id=<?=$row['admin_id']?>">[edit]</a> - <a href="deleteadmin.php?admin_id=<?=$row['admin_id']?>">[delete]</a></td>
				  	</tr>
				  	<?php } ?>
				</table><br />
		</div>
		<div id="footer">
			<a href="logout.php">Admin Logout</a>
		</div>
	</div>
    <div id="footer-nav">
			|<a href="index.php">Home</a> |
			<a href="registeredclubscrews.php">Registered Clubs / Crews</a> |
			<a href="programmedraw.php">Programme / Draw</a> |
			<a href="resultstimes.php">Results / Times</a> |			<a href="reports.php">Reports</a> |
			<a href="contacts.php">Contacts</a> |<br />
	</div>

</body>
</html>