<?php

function view(){
global $connection, $AdminID;

echo"
        <h2>Reports</h2>
        <img src='../images/rowing4.jpg' border='0'>
        <h3>Tables</h3>
        <p><a href='index.php?mode=clubsresults'>View Rowing Clubs Results</a><br />
        <i>Choose a Rowing Club and view a full list of all their crews’ results and times.</i>
        <br /><br />
        <a href='index.php?mode=clubspoints'>View Rowing Clubs Points</a><br />
        <i>View a full list of Rowing Clubs and their points for the regatta.</i>
        <br /><br />
        <a href='index.php?mode=associationspoints'>View Associations Points</a><br />
        <i>View Associations accumulative points for the regatta.</i></p>
        <h3>Graphs</h3>
        <p><a href='#' onClick='window.open(";?>"charts1.php", "_blank", config="height=500,width=700")<? echo"' border='0'>Rowing Clubs Crews Placed 1st</a><br />
        <i>View how many 1st placed crews each rowing club has for the regatta.</i>
        <br /><br />
        <a href='#' onClick='window.open(";?>"charts2.php", "_blank", config="height=500,width=700")<? echo"' border='0'>Rowing Clubs Crews Placed 2nd</a><br />
        <i>View how many 2nd placed crews each rowing club has for the regatta.</i>
        <br /><br />
        <a href='#' onClick='window.open(";?>"charts3.php", "_blank", config="height=500,width=700")<? echo"' border='0'>Rowing Clubs Crews Placed 3rd</a><br />
        <i>View how many 3rd placed crews each rowing club has for the regatta.</i>
        <br /><br />
        <a href='#' onClick='window.open(";?>"charts4.php", "_blank", config="height=440,width=1040")<? echo"' border='0'>Rowing Clubs Points</a><br />
        <i>View the total number of points the rowing clubs have achieved in the regatta.</i>
        <br /><br />
        <a href='#' onClick='window.open(";?>"charts5.php", "_blank", config="height=440,width=1040")<? echo"' border='0'>Associations Points</a><br />
        <i>View the total number of points the association have achieved in the regatta.</i>
        <br /><br /><br />
        To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function clubsresults(){
global $connection, $sort, $AdminID;
$query="select * from club order by '".$sort."'";
$result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Reports - Rowing Clubs Results</h2>
        <p>Please select a Rowing Club below to view their crews results for the regatta.</p>

        <table class='ViewTable'>
                <tr>
                        <th><a href='index.php?mode=clubsresults&sort=club_name' title='Sort' style='color:#fff;'>ROWING CLUB</a></th>
                        <th><a href='index.php?mode=clubsresults&sort=club_association' title='Sort' style='color:#fff;'>ASSOCIATION</a></th>
                        <th>CONTROL OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $club_id=$row_data["club_id"];
                $club_name=$row_data["club_name"];
                $club_association=$row_data["club_association"];

        echo "<tr class=".$class.">
                        <td>$club_name</td>
                        <td>$club_association</td>
                        <td><a href='index.php?mode=clubsresultsdetails&id=$club_id'>[View Results]</a></td>
              </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=view'>Back</a><br /><br />To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function clubsresultsdetails(){
global $connection, $AdminID;
$club_id = $_GET['id'];
$query="select club.club_id as club_id,
        club.club_name as club_name,
        crew.crew_id as crew_id,
        crew.crew_designation as crew_designation,
        crew.event_id,
        event.event_id as event_id,
        event.event_name as event_name,
        eventdetails.eventdetails_id as eventdetails_id,
        eventdetails.crew_id as eventcrew_id,
        eventdetails.eventdetails_result as eventdetails_result,
        eventdetails.eventdetails_time as eventdetails_time
        from club, crew, event, eventdetails
        where club.club_id = $club_id AND club.club_id = crew.club_id AND crew.event_id = event.event_id AND crew.crew_id = eventdetails.crew_id order by event.event_id";

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Reports - Rowing Clubs Results</h2><br />
        <table class='ViewTable'>
                <tr>
                        <th width='250'>EVENT</th>
                        <th width='250'>ROWING CLUB/CREW</th>
                        <th width='150'>RESULT/POSITION</th>
                        <th width='150'>TIME</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
        $event_name=$row_data["event_name"];
        $club_name=$row_data["club_name"];
        $crew_designation=$row_data["crew_designation"];
        $eventdetails_result=$row_data["eventdetails_result"];
        $eventdetails_time=$row_data["eventdetails_time"];

        echo "<tr class=".$class.">
                        <td><b>$event_name</b></td>
                        <td><b>$club_name $crew_designation</b></td>
                        <td><b>$eventdetails_result</b></td>
                        <td><b>$eventdetails_time</b></td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=clubsresults'>Back</a><br /><br />
       To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function clubspoints(){
global $connection, $AdminID;

$query = "select * from club, crew, eventdetails WHERE club.club_id = crew.club_id AND crew.crew_id = eventdetails.crew_id GROUP BY club.club_id";
$result = @mysql_query($query, $connection)
or die ("Unable to perform query<br />$query");
echo"<h2>Reports - Rowing Clubs Points</h2><br />
       <table class='ViewTable'>
                <tr>
                        <th width='250'>ROWING CLUB</th>
                        <th width='150'>REGATTA POINTS</th>
                </tr>";
        $class = "mainAlt";

        While ($row_data = mysql_fetch_array($result))
        {
        $club_name=$row_data["club_name"];
        echo "<tr><td>$club_name</td>";

        $query1 = "select count(eventdetails_result) AS Wins, club_name, eventdetails_result from club, crew, eventdetails WHERE club.club_id = crew.club_id AND crew.crew_id = eventdetails.crew_id AND club.club_name = '".$club_name."' GROUP BY club.club_id, eventdetails_result";
        $result1 = @mysql_query($query1, $connection)
        or die ("Unable to perform query<br />$query1");
                $totalPoints = 0;
                While($row1=mysql_fetch_array($result1)){
                        if($row1['eventdetails_result']=='1st'){
                                $totalPoints = $totalPoints + ($row1['Wins'] * 10);
                        }else if($row1['eventdetails_result']=='2nd'){
                                $totalPoints = $totalPoints + ($row1['Wins'] * 8);
                        }else if($row1['eventdetails_result']=='3rd'){
                                $totalPoints = $totalPoints + ($row1['Wins'] * 6);
                        }
                }
        echo"<td>$totalPoints</td></tr>";
        }
        if ($class=='main') $class = 'mainAlt'; else $class='main';

        echo"</table><p><a href='index.php?mode=view'>Back</a><br /><br />To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function associationspoints(){
global $connection, $AdminID;

$query = "select Distinct club_association from club, crew, eventdetails WHERE club.club_id = crew.club_id AND crew.crew_id = eventdetails.crew_id GROUP BY club.club_id";
$result = @mysql_query($query, $connection)
or die ("Unable to perform query<br />$query");
echo"<h2>Reports - Rowing Clubs Points</h2><br />
       <table class='ViewTable'>
                <tr>
                        <th width='250'>ASSOCIATION</th>
                        <th width='150'>REGATTA POINTS</th>
                </tr>";
        $class = "mainAlt";

        While ($row_data = mysql_fetch_array($result))
        {
        $club_association=$row_data["club_association"];
        echo "<tr><td>$club_association</td>";

        $query1 = "SELECT count( eventdetails_result ) AS Wins, club_name, eventdetails_result, club_association
                FROM club, crew, eventdetails
                WHERE club.club_id = crew.club_id
                AND crew.crew_id = eventdetails.crew_id
                AND club.club_association = '".$club_association."' 
                GROUP BY club.club_association, club.club_id, eventdetails_result";
        $result1 = @mysql_query($query1, $connection)
        or die ("Unable to perform query<br />$query1");
                $totalPoints = 0;
                While($row1=mysql_fetch_array($result1)){
                        if($row1['eventdetails_result']=='1st'){
                                $totalPoints = $totalPoints + ($row1['Wins'] * 10);
                        }else if($row1['eventdetails_result']=='2nd'){
                                $totalPoints = $totalPoints + ($row1['Wins'] * 8);
                        }else if($row1['eventdetails_result']=='3rd'){
                                $totalPoints = $totalPoints + ($row1['Wins'] * 6);
                        }
                }
        echo"<td>$totalPoints</td></tr>";
        }
        if ($class=='main') $class = 'mainAlt'; else $class='main';

        echo"</table><p><a href='index.php?mode=view'>Back</a><br /><br />To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

?>
