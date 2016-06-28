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
         if (confirm ('Are you sure you want to delete this Administrator?')) {
             document.location = path;
         }
     }
 // -->
 </script>

<script language="javascript" src="../js/isValidEmail.js"></script>
<SCRIPT LANGUAGE="JavaScript">
function validateForm() {
var invalid = " ";
var minLength = 4;
var maxLength = 25;
var usernamemaxLength = 10;
var postcodemaxLength = 10;
var phonemaxLength = 20;
var username = document.myForm.username.value;
var forename = document.myForm.forename.value;
var surname = document.myForm.surname.value;
var addressone = document.myForm.addressone.value;
var addresstwo = document.myForm.addresstwo.value;
var city = document.myForm.city.value;
var county = document.myForm.county.value;
var postcode = document.myForm.postcode.value;
var phone = document.myForm.phone.value;
var email = document.myForm.email.value;
var pw1 = document.myForm.password.value;
var pw2 = document.myForm.password2.value;


<!-- Username Validation // -->

if (username == '') {
alert('Please enter a username.');
return false;
}

if (document.myForm.username.value.length < minLength) {
alert('Your username must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.myForm.username.value.length > usernamemaxLength) {
alert('Your username must be a maximum of ' + usernamemaxLength + ' characters long. Try again.');
return false;
}

if (document.myForm.username.value.indexOf(invalid) > -1) {
alert("Sorry, spaces are not allowed in the username field.");
return false;
}


<!-- Forename Validation // -->

if (forename == '') {
alert('Please enter a forename.');
return false;
}

if (document.myForm.forename.value.length > maxLength) {
alert('Your forename must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}

if (document.myForm.forename.value.indexOf(invalid) > -1) {
alert("Sorry, spaces are not allowed in the forename field.");
return false;
}


<!-- Surname Validation // -->

if (surname == '') {
alert('Please enter a surname.');
return false;
}

if (document.myForm.surname.value.length > maxLength) {
alert('Your surname must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}

if (document.myForm.surname.value.indexOf(invalid) > -1) {
alert("Sorry, spaces are not allowed in the surname field.");
return false;
}


<!-- Email Validation // -->

if (! isValidEmail(document.myForm.email.value)) {
   alert("Please enter a valid email address");
   return false;
}


<!-- Address Line One Validation // -->

if (addressone == '') {
alert('Please enter an address at address line one.');
return false;
}

if (document.myForm.surname.value.length > maxLength) {
alert('Your surname must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Address Line One Validation // -->

if (addressone == '') {
alert('Please enter an address at address line one.');
return false;
}

if (document.myForm.surname.value.length > maxLength) {
alert('Your address at address line one must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- City Validation // -->

if (city == '') {
alert('Please enter a city.');
return false;
}

if (document.myForm.city.value.length > maxLength) {
alert('Your city must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- County Validation // -->

if (county == '') {
alert('Please enter a county.');
return false;
}

if (document.myForm.county.value.length > maxLength) {
alert('Your county must be a maximum of ' + maxLength + ' characters long. Try again.');
return false;
}


<!-- Postcode Validation // -->

if (postcode == '') {
alert('Please enter a postcode.');
return false;
}

if (document.myForm.postcode.value.length > postcodemaxLength) {
alert('Your postcode must be a maximum of ' + postcodemaxLength + ' characters long. Try again.');
return false;
}


<!-- Phone Validation // -->

if (phone == '') {
alert('Please enter a phone number.');
return false;
}

if (document.myForm.phone.value.length > phonemaxLength) {
alert('Your phone number must be a maximum of ' + phone + ' characters long. Try again.');
return false;
}

if (document.myForm.phone.value.indexOf(invalid) > -1) {
alert("Sorry, spaces are not allowed in the phone number field.");
return false;
}

if (isNaN(document.myForm.phone.value)) {
alert('Please enter a number in the phone number.');
return false;
}

<!-- Password Validation // -->

if (pw1 == '' || pw2 == '') {
alert('Please enter your password twice.');
return false;
}

if (document.myForm.password.value.length < minLength) {
alert('Your password must be at least ' + minLength + ' characters long. Try again.');
return false;
}

if (document.myForm.password.value.indexOf(invalid) > -1) {
alert("Sorry, spaces are not allowed in the password field.");
return false;
}
else {
if (pw1 != pw2) {
alert ("You did not enter the same password twice. Please re-enter your password.");
return false;
}
else {
            return true;
      }
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
                          switch($mode){
                                case "view":
                                viewAdministrators();
                                break;
                                case "add";
                                addAdminstrators();
                                break;
                                case "insert";
                                insertAdminstrators();
                                break;
                                case "edit";
                                editAdministrators();
                                break;
                                case "update";
                                updateAdminstrators();
                                break;
                                case "delete";
                                deleteAdminstrators();
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
