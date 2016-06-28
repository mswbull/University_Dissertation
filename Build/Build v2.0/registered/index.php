<?php
        require "../connect.php";
        require "../navigation.php";
        require "functions.php";
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
        <link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
        <div id="contain">

                <div id="header">
                </div>

                <div id="navbar">
                        <?php
                        navigation();
                        ?>
                </div>

                <div id="content">
                     <?php
                        $mode = $_GET['mode'];
                        $AdminID = $_SESSION['AdminID'];
                        $AdminClub = $_SESSION['AdminClub'];
                        switch($mode){
                                case "view":
                                viewclubs();
                                break;
                                case "viewdetails":
                                viewdetails();
                                break;
                                case "viewdetailssub":
                                viewdetailssub();
                                break;
                        }
                     ?>
                </div>

                <div id="footer">
                        <p><a href="../login.php">Admin Login</a></p>
                </div>

        </div>
    <div id="footer-nav">
                        <?php
                        footernavigation();
                        ?>
    </div>
</body>
</html>
