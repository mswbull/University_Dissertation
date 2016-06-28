<?php

function topbar(){
        global $connection, $AdminID, $AdminClub;
        if($_SESSION['level']=="Full"){
        echo"
                <img src='http://www.matthewbull.com/dorneyscc/images/topbarfull.jpg'>";
        }
        if($_SESSION['level']=="Club"){
        echo"
                <img src='http://www.matthewbull.com/dorneyscc/images/topbarclub.jpg'>";
        }
}

function navigation(){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registered/index.php?mode=view'>Registered Clubs/Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/viewprogramme/index.php?mode=view'>Programme</a> |
                <a href='http://www.matthewbull.com/dorneyscc/viewresults/index.php?mode=view'>Results</a> |
                <a href='http://www.matthewbull.com/dorneyscc/reports/index.php?mode=view'>Reports</a> |
                <a href='http://www.matthewbull.com/dorneyscc/contactus.php'>Contact Us</a> |";
}

function footernavigation(){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registered/index.php?mode=view'>Registered Clubs/Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/viewprogramme/index.php?mode=view'>Programme</a> |
                <a href='http://www.matthewbull.com/dorneyscc/viewresults/index.php?mode=view'>Results</a> |
                <a href='http://www.matthewbull.com/dorneyscc/reports/index.php?mode=view'>Reports</a> |
                <a href='http://www.matthewbull.com/dorneyscc/contactus.php'>Contact Us</a> |<br /><br />";
}

function adminnavigation(){
        global $connection, $AdminID, $AdminClub;
        if($_SESSION['level']=="Full"){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/li_index/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/clubs/index.php?mode=viewclubs'>Register Clubs</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registration/index.php?mode=view'>Register Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/programme/index.php?mode=main'>Programme</a> |
                <a href='http://www.matthewbull.com/dorneyscc/results/index.php?mode=view'>Results</a> |
                <a href='http://www.matthewbull.com/dorneyscc/administrators/index.php?mode=view'>Administrator Accounts</a> |";
        }
        if($_SESSION['level']=="Club"){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/li_index/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registration/index.php?mode=view'>Register Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/administrators/index.php?mode=view'>Administrator Account</a> |";
        }
}

function adminfooternavigation(){
        global $connection, $AdminID, $AdminClub;
        if($_SESSION['level']=="Full"){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/li_index/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/clubs/index.php?mode=viewclubs'>Register Clubs</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registration/index.php?mode=view'>Register Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/programme/index.php?mode=main'>Programme</a> |
                <a href='http://www.matthewbull.com/dorneyscc/results/index.php?mode=view'>Results</a> |
                <a href='http://www.matthewbull.com/dorneyscc/administrators/index.php?mode=view'>Administrator Accounts</a> |<br /><br /> ";
        }
        if($_SESSION['level']=="Club"){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/li_index/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registration/index.php?mode=view'>Register Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/administrators/index.php?mode=view'>Administrator Account</a> |<br /><br />";
        }
}

?>


