<?php
        require "navigation.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
        <meta name="Author" content="Matthew Bull" />
        <meta name="keywords" content="Rowing, Coastal Rowing, Regatta, Amateur Rowing Association, ARA, Hants &amp; Dorset, H&amp;DARA, Coast, CARA, West of England, WEARA, South Coast Championship" />
        <meta name="description" content="The Coastal Rowing South Coast Championship Regatta" />
        <meta name="robots" content="all" />
        <title>Dorney South Coast Championships</title>
        <link rel="stylesheet" type="text/css" href="style/style.css" />
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
                        <h2>About The Website</h2>
                        <img src='./images/boathouse.jpg' alt='Dorney Boathouse' />
                        <p>This website has been designed to allow all aspects of the South Coast Championship regatta to be ran from one central point. Everything from crew registrations, the programme, fixtures and results can be accessed from this website. If you are a Rowing Club Secretary you also have the ability to submit entries for your crews online. To do so please login to the admin section below using your username and password. If you do not have a username or password or would like any further information please feel free to <a href='./contactus.php'>contact us.</a>
                        <br /><br />The website was designed by Matthew Bull and was signed as final on 23rd March 2007.
                        <br /><br />The application has been vigorously tested and validated by the W3c Quality Assurance. To view the results of the validation please click the images below.
                        <br /><br />
                        <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fwww.matthewbull.com%2Fdorneyscc%2F"><img style="float:left;border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" /></a>
                        <a href="http://jigsaw.w3.org/css-validator/validator?uri=http://www.matthewbull.com/dorneyscc/style/stylemain.css"><img style="float:left;border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
                        </p>
                </div>

                <div id="footer">
                        <p><a href="login.php">Admin Login</a></p>
                </div>

        </div>
    <div id="footer-nav">
                        <?php
                        footernavigation();
                        ?>
        </div>
</body>
</html>
