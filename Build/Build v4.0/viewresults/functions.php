<?php

function view(){
global $connection, $AdminID;
        $query="select distinct
        event.event_name,
        event.event_id,
        event.event_name,
        event.event_type
        from eventdetails, event
        where eventdetails.event_id = event.event_id order by event.event_type, event.event_id";

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Results</h2>
        <p>Please click “View Event Results” for the specific event to see a full list of results and times.</p>

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
                        <td><a href='index.php?mode=viewdetails&id=$event_id'>[View Event Results]</a></td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p>To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function viewdetails($event_id){
global $connection, $AdminID;
if (!isset($event_id)){
$event_id = $_GET['id'];
}
$query="select club.club_name as club_name,
        crew.crew_id as crew_id,
        crew.crew_designation as crew_designation,
        eventdetails.eventdetails_id as eventdetails_id,
        eventdetails.crew_id as eventcrew_id,
        eventdetails.eventdetails_result as eventdetails_result,
        eventdetails.eventdetails_time as eventdetails_time
        from club, crew, eventdetails
        where eventdetails.event_id = '$event_id' and eventdetails.crew_id = crew.crew_id and club.club_id = crew.club_id order by eventdetails_time, crew_id";

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Event Results</h2><br />

        <table class='ViewTable'>
                <tr>
                        <th width='150'>RESULT/POSITION</th>
                        <th width='250'>ROWING CLUB/CREW</th>
                        <th width='150'>TIME</th>
                </tr>";
        $class = "main";
        While ($row_data = mysql_fetch_array($result))
        {
        $club_name=$row_data["club_name"];
        $crew_id=$row_data["crew_id"];
        $crew_designation=$row_data["crew_designation"];
        $eventdetails_id=$row_data["eventdetails_id"];
        $eventdetails_result=$row_data["eventdetails_result"];
        $eventdetails_time=$row_data["eventdetails_time"];
        $eventcrew_id=$row_data["eventcrew_id"];
        echo "<tr class=".$class.">
                        <td><b>$eventdetails_result</b></td>
                        <td><b>$club_name $crew_designation</b></td>
                        <td><b>$eventdetails_time</b></td>
                </tr>";
        if ($class=='main') $class = 'main'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=view'>Back</a><br /><br />
       To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

?>
