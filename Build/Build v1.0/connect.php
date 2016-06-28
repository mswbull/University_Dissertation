<?php
	$db_host = "localhost";
	$db_name = "dorneyscc";
	$db_username = "dorneyscc";
	$db_password = "987654321";

	$connection = @mysql_pconnect ($db_host, $db_username, $db_password)
		or die ("Unable to make connection to database server");
	@mysql_select_db($db_name, $connection)
		or die ("Unable to find database $db_name");
?>