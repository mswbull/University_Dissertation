<?php
        session_start();
        if (isset($_SESSION['username'])==false){
                header("Location:../login.php");
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

<script language="JavaScript" type="text/javascript">
 <!-- Hide script
     function deleteItem(path) {
         if (confirm ('Are you sure you want to delete this Rowing Club?')) {
             document.location = path;
         }
     }
 // -->
</script>

<script language="JavaScript" type="text/javascript">
        function validateMeAdd(){
                var errMsg = "";
                if (document.AddClub.club_name.value == "") {
                errMsg = errMsg + "Please enter a rowing club name \n";
                }
                if(errMsg != ""){
                errMsg="The following errors occurred:\n"+errMsg;
                alert(errMsg);
                }
        }
</script>

<script language="JavaScript" type="text/javascript">
        function validateMeEdit(){
                var errMsg = "";
                if (document.EditClub.club_name.value == "") {
                errMsg = errMsg + "Please enter a rowing club name \n";
                }
                if(errMsg != ""){
                errMsg="The following errors occurred:\n"+errMsg;
                alert(errMsg);
                }
        }
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
                          $sort = $_GET['sort'];
                          $AdminID = $_SESSION['AdminID'];
                          switch($mode){
                                case "viewclubs":
                                viewclubs();
                                break;
                                case "addclub";
                                addclub();
                                break;
                                case "insertclub";
                                insertclub();
                                break;
                                case "editclub";
                                editclub();
                                break;
                                case "updateclub";
                                updateclub();
                                break;
                                case "deleteclub";
                                deleteclub();
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
