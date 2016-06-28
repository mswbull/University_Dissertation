<?php
        require "../navigation.php";
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

        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                <title>Dorney SCC Location</title>
                <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAHQt7xaZ2R_3ZlP6s5NloyhR27X3jngS1TPQ55V3N2JZvDER3xRRYAksFvTyiIMKOfqMgOdkJhyxy5A" type="text/javascript">
                </script>

        <script type="text/javascript">

                //<![CDATA[

        function load() {
                if (GBrowserIsCompatible()) {
                        var map = new GMap2(document.getElementById("map"));
                        map.addControl(new GSmallMapControl());
                        map.addControl(new GMapTypeControl());
                        map.setCenter(new GLatLng(51.493649, -0.649867), 13, G_SATELLITE_MAP);
                }
        }

        //]]>

        </script>
</head>
<body onload="load()" onunload="GUnload()">
        <div id="contain">

                <div id="header">
                </div>

                <div id="navbar">
                        <?php
                        navigation();
                        ?>
                </div>

                <div id="content">
                        <h2>Find Dorney</h2>
                        <p>Please use the map below to help you locate Dorney.</p>
                        <div id="googlemap">
                        <center><div id="map" style="width: 780px; height: 300px"></div></center>
                        </div>
                        <p><a href='../index.php'>Back</a><br /><br />To report an issue please click <a href='../contactus.php'>here</a>.</p>
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
