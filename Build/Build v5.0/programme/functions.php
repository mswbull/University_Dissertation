<?php

function main(){
global $connection, $AdminID;

echo"
        <h2>Programme Management</h2>
        <img src='../images/boathouse.jpg' border='0'>
        <p>Please select a control option below.<br /><br />
        <a href='javascript:CreateProgramme(\"./index.php?mode=createprogramme\")'>Create Programme</a><br /><br />
        <a href='javascript:DeleteProgramme(\"./index.php?mode=deleteprogramme\")'>Delete Programme</a><br /><br />
        <a href='index.php?mode=viewprogramme'>View Programme</a><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        For help using this page please click <a href='index.php?mode=help'>here</a> to view the help file.<br /><br />
        To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function help(){
global $connection, $AdminID;

echo"
        <h2>Programme Management Help</h2>
        <p><b>Create Programme</b><br />
        Once all rowing clubs have entered their crews you can create the regatta programme which will put each crew into its specific event. To do this please click “Create Programme”. Please note once the programme has been created it will be live for all users to access.<br /><br />
        (Please note that if the “Create Programme” button is clicked once a programme has already been created the original data will be over written.)<br /><br />
        <b>Delete Programme</b><br />
        If you wish to delete a programme that was previously created please click the “Delete Programme” button.<br /><br />
        <b>View Programme</b><br />
        Once the programme has been created it can be viewed by either clicking “View Programme” or by accessing from Programme button on the navigation bar when not logged in.<br /><br />
        <a href='index.php?mode=main'>Back</a></p>";
}

function createprogramme(){
global $connection, $AdminID;
         $query="TRUNCATE eventdetails";
         $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

                $query1="select * from crew";
                $result1=mysql_query($query1, $connection)
                        or die("Unable to perform query<br />$query1");

                While ($row_data = mysql_fetch_array($result1))
                {
                $crew_id=$row_data["crew_id"];
                $event_id=$row_data["event_id"];

                        $query2="select * from event where event_id = $event_id";
                        $result2=mysql_query($query2, $connection)
                                or die("Unable to perform query<br />$query2");

                        $row_data2 = mysql_fetch_array($result2);

                                $query3="insert into eventdetails values(0, '$event_id', '$crew_id', ' ', ' ')";
                                mysql_query($query3,$connection)
                                        or die ("Unable to perform query<br />$query3");
         }
viewprogramme();
}

function viewprogramme(){
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
                        <td><a href='index.php?mode=viewprogrammedetails&id=$event_id'>[View Event Details]</a></td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=main'>Back</a><br /><br />
       To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function viewprogrammedetails(){
global $connection, $AdminID;
$event_id = $_GET['id'];
        $query="select club.club_name as club_name, crew.crew_id as crew_id, crew.crew_designation as crew_designation, eventdetails.crew_id from club, crew, eventdetails where eventdetails.event_id = '$event_id' and eventdetails.crew_id = crew.crew_id and club.club_id = crew.club_id";
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
       echo"</table><p><a href='index.php?mode=viewprogramme'>Back</a><br /><br />
       To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function viewcrewdetails(){
global $connection, $AdminID;
$crew_id = $_GET['id'];
        $query="select * from competitor where crew_id = '$crew_id'";
$result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Crew Details</h2><br />

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
                        <td>$competitor_bow</td>
                        <td>$competitor_two</td>
                        <td>$competitor_three</td>
                        <td>$competitor_stroke</td>
                        <td>$competitor_cox</td>
                </tr>
                <tr>
                        <th>SUBSTITUTE COMPETITORS</th>
                        <td>$competitor_sbow</td>
                        <td>$competitor_stwo</td>
                        <td>$competitor_sthree</td>
                        <td>$competitor_sstroke</td>
                        <td>$competitor_cox</td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=viewprogramme'>Back To Events</a><br /><br />
       To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function deleteprogramme(){
global $connection, $AdminID;
         $query="TRUNCATE eventdetails";
         $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
main();
}

?>
