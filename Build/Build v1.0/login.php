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

	<script language="JavaScript" type="text/javascript">
	function validateMe(){
	var errMsg = "";
	if ((document.LoginForm.username.value == "") &&
		(document.LoginForm.password.value == "")) {
	errMsg = errMsg + "You must enter a username and password \n";
	} else if (document.LoginForm.username.value == "") {
	errMsg = errMsg + "You did not enter a username \n";
	} else if (document.LoginForm.password.value == "") {
	errMsg = errMsg + "You did not enter a password \n";
	}

	if(errMsg != ""){
		errMsg="The following errors occurred:\n"+errMsg;
		alert(errMsg);
	}
	else{
		LoginForm.submit();
	}
	}
	</script>

</head>
<body>
	<div id="contain">

		<div id="header">
		</div>

		<div id="navbar">
			|<a href="index.php">Home</a> |
			<a href="registeredclubscrews.php">Registered Clubs / Crews</a> |
			<a href="programmedraw.php">Programme / Draw</a> |
			<a href="resultstimes.php">Results / Times</a> |
			<a href="reports.php">Reports</a> |
			<a href="contacts.php">Contacts</a> |
		</div>

		<div id="content">
				<h2>Admin Login</h2>
                <img src='./images/dorney1.jpg' border='0'>
                <p>This administration section will allow Rowing Club Secretaries to register their club and crews online. As well as offer additional useful tools.</p>
                <p>Please login below using your username and password.</p>
                <p><form name = "LoginForm" action ="logincheck.php" method="get">
					<p>Username:<br /><input name="username"type="text"></p>
					<p>Password:<br /><input name="password"type="password"></p>
					<p><input name="submit"type="submit"value="Login" onClick="javascript: validateMe()"></p>
					<p style="color: maroon"><?php if(isset($_GET['li_message'])) { ?> <?php echo $_GET['li_message']; } ?></p>
					<p style="color: maroon"><?php if(isset($_GET['lo_message'])) { ?> <?php echo $_GET['lo_message']; } ?></p>
				</form></p>
				<p><br />To report an issue please click <a href="contacts">here</a>.<p>
		</div>

		<div id="footer">
			<br />
		</div>

	</div>
    <div id="footer-nav">
			|<a href="index.php">Home</a> |
			<a href="registeredclubscrews.php">Registered Clubs / Crews</a> |
			<a href="programmedraw.php">Programme / Draw</a> |
			<a href="resultstimes.php">Results / Times</a> |
			<a href="reports.php">Reports</a> |
			<a href="contacts.php">Contacts</a> |<br />
	</div>

</body>
</html>