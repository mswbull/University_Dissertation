<?php
        session_start();
        if (isset($_SESSION['username'])==false){
                header("Location:../login.php");
                exit();
        }
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
        <link rel="stylesheet" type="text/css" href="../style/adminstyle.css" />

<script language="JavaScript" type="text/javascript">
 <!-- Hide script
     function CreateProgramme(path) {
         if (confirm ('Are you sure you want to automatically create the regatta programme?\nPlease note this will overwrite any existing programme.')) {
             document.location = path;
         }
     }
 // -->
</script>

<script language="JavaScript" type="text/javascript">
 <!-- Hide script
     function DeleteProgramme(path) {
         if (confirm ('Are you sure you want to delete the current regatta programme?\nPlease note all results currently entered will be lost.')) {
             document.location = path;
         }
     }
 // -->
</script>

</head>
<body>
        <div id="contain">

                <div id="header">
                        <?php
                        topbar();
                        ?>
                </div>

                <div id="navbar">
                        <?php
                        adminnavigation();
                        ?>
                </div>

                <div id="content">
                        <?php
                          $mode = $_GET['mode'];
                          $AdminID = $_SESSION['AdminID'];
                          switch($mode){
                                case "main";
                                main();
                                break;
                                case "help";
                                help();
                                break;
                                case "createprogramme";
                                createprogramme();
                                break;
                                case "viewprogramme";
                                viewprogramme();
                                break;
                                case "viewprogrammedetails";
                                viewprogrammedetails();
                                break;
                                case "viewcrewdetails";
                                viewcrewdetails();
                                break;
                                case "deleteprogramme";
                                deleteprogramme();
                                break;
                          }
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
