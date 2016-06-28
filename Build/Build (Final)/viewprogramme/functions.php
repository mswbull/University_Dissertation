<?php

function view(){
global $connection, $AdminID;
        $query="select distinct * from event order by event_id";
$result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Programme - Events</h2>
        <p>Please click “View Event Details” for the specific event to see the crews entered.</p>

        <table class='ViewTable'>
                <tr>
                        <th>EVENT NAME</th>
                        <th>EVENT TYPE</th>
                        <th>CONTROL OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
        $event_id=$row_data["event_id"];
        $event_name=$row_data["event_name"];
        $event_type=$row_data["event_type"];

        echo "<tr class=".$class.">
                        <td><b>$event_name</b></td>
                        <td><b>$event_type</b></td>
                        <td><a href='index.php?mode=viewdetails&id=$event_id'>[View Event Details]</a></td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p>To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function viewdetails(){
global $connection, $AdminID;
$event_id = $_GET['id'];
        $query="select club.club_name as club_name,
        crew.crew_id as crew_id,
        crew.crew_designation as crew_designation,
        eventdetails.crew_id
        from club, crew, eventdetails
        where eventdetails.event_id = '$event_id' and eventdetails.crew_id = crew.crew_id and club.club_id = crew.club_id";
$result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Programme - Event Details</h2>
        <p>Please click “View Crew Details” for the specific crew to see the competitors.</p>

        <table class='ViewTable'>
                <tr>
                        <th width='250'>ROWING CLUB/CREW</th>
                        <th>CONTROL OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {

        $club_name=$row_data["club_name"];
        $crew_id=$row_data["crew_id"];
        $crew_designation=$row_data["crew_designation"];

        echo "<tr class=".$class.">
                        <td><b>$club_name $crew_designation</b></td>
                        <td><a href='index.php?mode=viewcrewdetails&id=$crew_id'>[View Crew Details]</a></td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=view'>Back</a><br /><br />
       To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function viewcrewdetails(){
global $connection, $AdminID;
$crew_id = $_GET['id'];
        $query="select * from competitor where crew_id = '$crew_id'";
$result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Programme - Crew Details</h2><br />

        <table class='ViewTable'>
                <tr>
                        <th width='200'></th>
                        <th>BOW</th>
                        <th>TWO</th>
                        <th>THREE</th>
                        <th>STROKE</th>
                        <th>COX</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {

        $competitor_bow=$row_data["competitor_bow"];
        $competitor_two=$row_data["competitor_two"];
        $competitor_three=$row_data["competitor_three"];
        $competitor_stroke=$row_data["competitor_stroke"];
        $competitor_cox=$row_data["competitor_cox"];
        $competitor_sbow=$row_data["competitor_sbow"];
        $competitor_stwo=$row_data["competitor_stwo"];
        $competitor_sthree=$row_data["competitor_sthree"];
        $competitor_sstroke=$row_data["competitor_sstroke"];

        echo "<tr>
                        <th>PRIMARY COMPETITORS</th>
                        <td><b>$competitor_bow</b></td>
                        <td><b>$competitor_two</b></td>
                        <td><b>$competitor_three</b></td>
                        <td><b>$competitor_stroke</b></td>
                        <td><b>$competitor_cox</b></td>
                </tr>
                <tr>
                        <th>SUBSTITUTE COMPETITORS</th>
                        <td><b>$competitor_sbow</b></td>
                        <td><b>$competitor_stwo</b></td>
                        <td><b>$competitor_sthree</b></td>
                        <td><b>$competitor_sstroke</b></td>
                        <td><b>$competitor_cox</b></td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=view'>Back To Events</a><br /><br />
       To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

?>
