<?php

function navigation(){
        echo"
                | <a href='index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registered/index.php?mode=view'>Registered Clubs / Crews</a> |
                <a href='programmedraw.php'>Programme / Draw</a> |
                <a href='resultstimes.php'>Results / Times</a> |
                <a href='reports.php'>Reports</a> |
                <a href='http://www.matthewbull.com/dorneyscc/contactus.php'>Contact Us</a> |";
}

function footernavigation(){
        echo"
                | <a href='index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registered/index.php?mode=view'>Registered Clubs / Crews</a> |
                <a href='programmedraw.php'>Programme / Draw</a> |
                <a href='resultstimes.php'>Results / Times</a> |
                <a href='reports.php'>Reports</a> |
                <a href='http://www.matthewbull.com/dorneyscc/contactus.php'>Contact Us</a> |<br /><br />";
}

function adminnavigation(){
        global $connection, $AdminID, $AdminClub;
        if($_SESSION['level']=="Full"){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/li_index/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/clubs/index.php?mode=viewclubs'>Registered Clubs</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registration/index.php?mode=view'>Registered Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/programme/index.php?mode=view'>Programme</a> |
                <a href='resultstimes.php'>Results</a> |
                <a href='http://www.matthewbull.com/dorneyscc/administrators/index.php?mode=view'>Administrator Accounts</a> |";
        }
        if($_SESSION['level']=="Club"){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/li_index/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registration/index.php?mode=view'>Registered Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/administrators/index.php?mode=view'>Administrator Account</a> |";
        }
}

function adminfooternavigation(){
        global $connection, $AdminID, $AdminClub;
        if($_SESSION['level']=="Full"){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/li_index/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/clubs/index.php?mode=viewclubs'>Registered Clubs</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registration/index.php?mode=view'>Registered Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/programme/index.php?mode=view'>Programme</a> |
                <a href='resultstimes.php'>Results</a> |
                <a href='http://www.matthewbull.com/dorneyscc/administrators/index.php?mode=view'>Administrator Accounts</a> |<br /><br /> ";
        }
        if($_SESSION['level']=="Club"){
        echo"
                | <a href='http://www.matthewbull.com/dorneyscc/li_index/index.php'>Home</a> |
                <a href='http://www.matthewbull.com/dorneyscc/registration/index.php?mode=view'>Registered Crews</a> |
                <a href='http://www.matthewbull.com/dorneyscc/administrators/index.php?mode=view'>Administrator Account</a> |<br /><br />";
        }
}

?>


