<?php
        session_start();
        if (isset($_SESSION['username'])==false){
                header("Location:login.php");
                exit();
        }
        require "navigation.php";
        $forename = $_SESSION['forename'];
        $surname = $_SESSION['surname'];
        $email = $_SESSION['email'];
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
        <link rel="stylesheet" type="text/css" href="style/adminstyle.css" />
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
                <h2>Contact Us</h2>
                        <img src='./images/rowing3.jpg' border='0'>
                        <form onsubmit="return checkForm();" name="enquiryform" method="POST" action="li_contact.php">
                        <input type="hidden" name="required" value="Name,Email,Question">
                        <p>If you are having trouble using this web application or have a question about the regatta itself please feel free to contact us using the form provided below. All questions will be answered as soon as possible.<br /><br />
                        Name:<br />
                        <input type="text" name="Name" value="<?php echo $forename." ".$surname;?>"><br /><br />
                        Email:<br />
                        <input type="text" name="Email" value="<?php echo $email;?>"><br /><br />
                        Question:<br />
                        <textarea name="Question"></textarea><br /><br />
                        <input type="submit" name="submit" value="Submit">
                        </form></p>
                </div>

                <div id="footer">
                        <p><a href="logout.php">Admin Logout</a></p>
                </div>

        </div>
    <div id="footer-nav">
                        <?php
                        adminfooternavigation();
                        ?>
        </div>
</body>
</html>
