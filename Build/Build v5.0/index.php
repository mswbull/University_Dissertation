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

        <script type="text/javascript" src="./js/prototype.js"></script>
        <script type="text/javascript" src="./js/scriptaculous.js?load=effects"></script>
        <script type="text/javascript" src="./js/lightbox.js"></script>
        <link rel="stylesheet" href="./style/lightbox.css" type="text/css" media="screen" />
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
                        <h2>Welcome</h2>
                        <img src='./images/scclogo.jpg' alt='SCC Logo' />

                        <h3>Dorney South Coast Championships 2007</h3>
                        <p>The 51st South Coast Championships Coastal Rowing Regatta will take place on Saturday, 8th September, 2007 at Dorney Lake, Eton on the 2006 World Rowing Championships Course and the venue for the 2012 Olympic Regatta.</p>

                        <h3>The Athlete's Championships</h3>
                        <p>The Hants &amp; Dorset Amateur Rowing Association hope that the combination of such an excellent and fair course in an area close to so many places of interest should ensure a memorable experience for Competitors and Spectators alike and take the South Coast Championships Coastal Rowing Regatta to a new level. It is hoped to be remembered as "the Athlete's Championships" as needs of the athletes and coaches are at the forefront of the planning.</p>

                        <h3>South Coast Championship Event Organiser</h3>
                        <p>This website has been designed to allow all aspects of the regatta to be ran from one central point. Everything from crew registrations, the programme, fixtures and results can be accessed from this website. If you are a Rowing Club Secretary you also have the ability to submit entries for your crews online. To do so please login to the admin section below using your username and password. If you do not have a username or password or would like any further information please feel free to <a href='contactus.php'>contact us.</a></p>

                        <p><a href='./location/index.php'>Find Dorney</a> -
                        <a href="./images/dorney1.jpg" rel="lightbox[dorneyscc]">Photos of Dorney</a>
                        <a href="./images/dorney2.jpg" rel="lightbox[dorneyscc]"></a>
                        <a href="./images/boathouse.jpg" rel="lightbox[dorneyscc]"></a>
                        <a href="./images/rowing1.jpg" rel="lightbox[dorneyscc]"></a>
                        <a href="./images/rowing2.jpg" rel="lightbox[dorneyscc]"></a>
                        <a href="./images/rowing3.jpg" rel="lightbox[dorneyscc]"></a>
                        <a href="./images/rowing4.jpg" rel="lightbox[dorneyscc]"></a>
                        <a href="./images/sunset.jpg" rel="lightbox[dorneyscc]"></a> -
                        <a href="http://www.dorneyscc.co.uk">www.DorneySCC.co.uk</a> -
                        <a href="./about.php">About the Website</a></p>
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
