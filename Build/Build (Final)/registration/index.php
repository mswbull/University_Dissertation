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
     function deleteItem(path) {
         if (confirm ('Are you sure you want to delete this Crew?')) {
             document.location = path;
         }
     }
 // -->
</script>

<SCRIPT LANGUAGE="JavaScript">
function validateForm() {
var invalid = " ";
var minLength = 2;
var maxLength = 25;
var bow = document.Crew.bow.value;
var two = document.Crew.two.value;
var three = document.Crew.three.value;
var stroke = document.Crew.stroke.value;
var cox = document.Crew.cox.value;
var sbow = document.Crew.sbow.value;
var stwo = document.Crew.stwo.value;
var sthree = document.Crew.sthree.value;
var sstroke = document.Crew.sstroke.value;


<!-- Bow Validation // -->

if (bow == '') {
alert('Please enter the bow persons name.');
return false;
}

if (document.Crew.bow.value.length < minLength) {
alert('The bow persons name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.bow.value.length > maxLength) {
alert('The bow persons name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Two Validation // -->

if (two == '') {
alert('Please enter the two persons name.');
return false;
}

if (document.Crew.two.value.length < minLength) {
alert('The two persons name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.two.value.length > maxLength) {
alert('The two persons name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Three Validation // -->

if (three == '') {
alert('Please enter the three persons name.');
return false;
}

if (document.Crew.three.value.length < minLength) {
alert('The three persons name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.three.value.length > maxLength) {
alert('The three persons name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Stroke Validation // -->

if (stroke == '') {
alert('Please enter the stroke persons name.');
return false;
}

if (document.Crew.stroke.value.length < minLength) {
alert('The stroke persons name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.stroke.value.length > maxLength) {
alert('The stroke persons name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Cox Validation // -->

if (cox == '') {
alert('Please enter the coxes name.');
return false;
}

if (document.Crew.cox.value.length < minLength) {
alert('The coxes name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.cox.value.length > maxLength) {
alert('The coxes name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Sub-Bow Validation // -->

if (sbow == '') {
alert('Please enter the substitute bow persons name.');
return false;
}

if (document.Crew.sbow.value.length < minLength) {
alert('The substitute bow persons name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.sbow.value.length > maxLength) {
alert('The substitute bow persons name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Sub-Two Validation // -->

if (stwo == '') {
alert('Please enter the substitute two persons name.');
return false;
}

if (document.Crew.stwo.value.length < minLength) {
alert('The substitute two persons name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.stwo.value.length > maxLength) {
alert('The substitute two persons name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Sub-Three Validation // -->

if (sthree == '') {
alert('Please enter the substitute three persons name.');
return false;
}

if (document.Crew.sthree.value.length < minLength) {
alert('The substitute three persons name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.sthree.value.length > maxLength) {
alert('The substitute three persons name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Sub-Stroke Validation // -->

if (sstroke == '') {
alert('Please enter the substitute stroke persons name.');
return false;
}

if (document.Crew.sstroke.value.length < minLength) {
alert('The substitute stroke persons name must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.Crew.sstroke.value.length > maxLength) {
alert('The substitute stroke persons name must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}

else {
            return true;
      }
}

</script>

<script type="text/javascript" language="javascript" src="../js/floatie.js"></script>

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
                                case "addcrews":
                                addcrews();
                                break;
                                case "insertcrews":
                                insertcrews();
                                break;
                                case "editcrews":
                                editcrews();
                                break;
                                case "updatecrews":
                                updatecrews();
                                break;
                                case "deletecrews":
                                deletecrews();
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
