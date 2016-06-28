<?php
	session_start();
	if(isset($_SESSION['username'])==false){
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
				<h2>Add New Administrator</h2>
				<p>Please fill out the required fields below to create a new Full or Club Administrator.</p>
				<form action="editclubadmin1.php" method="get">

				<table border="0">
					<tr>
						<td width="200">Username:<br /><input name="username" type="text" value="<?=$row['username']?>"></td>
						<td>Registered Region:<br /><select name="region"><option value="CARA" name="cara">CARA</option><option value="HDARA" name="hdara">HDARA</option><option value="WEARA" name="weara">WEARA</option></select></td>
					</tr>
					<tr>
						<td>Password:<br /><input name="password" type="password" value="<?=$row['password']?>"></td>
						<td>Registered Club:<br /><input name="club" type="text" value="<?=$row['admin_club']?>"></td>
					</tr>
					<tr>
						<td>Forename:<br /><input name="forename" type="text" value="<?=$row['admin_forename']?>"></td>
					</tr>
					<tr>
						<td>Surname:<br /><input name="surname" type="text" value="<?=$row['admin_surname']?>"></td>
					</tr>
				</table>
				<p><input name="Save" type="submit" value="Save"></p>
				<input type="hidden" name="admin_id" value="<?=$row['admin_id']?>">
				<input type="hidden" name="level" value="<?=$row['admin_level']?>">
				</form>
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