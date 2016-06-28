<?php
        require "navigation.php";
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
                                <h2>Admin Login</h2>
                                <img src='./images/dorney1.jpg' border='0'>
                                <p>This administration section will allow Rowing Club Secretaries to register their club and crews online. As well as offer additional useful tools. <br /><br />Please login below using your username and password.</p>
                                <form name = "LoginForm" action ="logincheck.php" method="get">
                                <table name="Login" class="contenttable">
                                        <tr>
                                                <td>Username:</td>
                                        </tr>
                                        <tr>
                                                <td><input name="username"type="text"></td>
                                        </tr>
                                        <tr>
                                                <td>Password:</td>
                                        </tr>
                                        <tr>
                                                <td><input name="password"type="password"></td>
                                        </tr>
                                        <tr>
                                                <td><br /><input name="submit"type="submit"value="Login" onClick="javascript: validateMe()"></td>
                                        </tr>
                                </table>
                                <p><br />To report an issue please click <a href="contactus.php">here</a>.</p>
                </div>

                <div id="footer">

                </div>

        </div>
    <div id="footer-nav">
                        <?php
                        footernavigation();
                        ?>
        </div>
</body>
</html>
