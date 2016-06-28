<?php
        session_start();
        if (isset($_SESSION['username'])==false){
                header("Location:login.php");
                exit();
        }
        require "../connect.php";
        require "../navigation.php";
        require "functions.php";
                $query = "select * from admin WHERE username = '".$_SESSION['username']."'";
                $result = mysql_query($query, $connection)
                or die ("Unable to perform query<br />$query");
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
        <link rel="stylesheet" type="text/css" href="../style/adminstyle.css" />
</head>
<body>
        <div id="contain">

                <div id="header">
                </div>

                <div id="navbar">
                        <?php
                        adminnavigation();
                        ?>
                 </div>

                <div id="content">
                        <h2>Welcome</h2>
                        <img src='../images/dorney2.jpg' border='0'>
                        <h3>Please select an option from the navigation bar above.</h3>
                        <?php
                        admincontent();
                        ?>
                </div>

                <div id="footer">
                        <p><a href="../logout.php">Admin Logout</a></p>
                </div>

        </div>
    <div id="footer-nav">
                        <?php
                        adminfooternavigation();
                        ?>
        </div>
</body>
</html>
