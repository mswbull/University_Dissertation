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
        <p>Please click “View/Add/Update Event Results” for the specific event to view, add or update results and times.<br />(Please note only events with crews entered are shown here).</p>

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
                        <td>$event_type</td>
                        <td><a href='index.php?mode=viewdetails&id=$event_id'>[View/Add/Update Event Results]</a></td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p>To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function viewdetails($event_id){
global $connection, $AdminID;
if (!isset($event_id)){
$event_id = $_GET['id'];
}
$query="

        select club.club_name as club_name,
        crew.crew_id as crew_id,
        crew.crew_designation as crew_designation,
        eventdetails.eventdetails_id as eventdetails_id,
        eventdetails.crew_id as eventcrew_id,
        eventdetails.eventdetails_result as eventdetails_result,
        eventdetails.eventdetails_time as eventdetails_time
        from club, crew, eventdetails
        where eventdetails.event_id = '$event_id' and eventdetails.crew_id = crew.crew_id and club.club_id = crew.club_id order by eventdetails_result, crew_id";

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Event Results</h2>
        <p>To add or update the result and time for a crew in this event please click “Add/Edit Result” for the specific crew.</p>

        <table class='ViewTable'>
                <tr>
                        <th width='150'>RESULT/POSITION</th>
                        <th width='250'>ROWING CLUB/CREW</th>
                        <th width='150'>TIME</th>
                        <th width='250'>CONTROL OPTIONS</th>
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
                        <td><a href='index.php?mode=add&id=$eventdetails_id&event_id=$event_id'>[Add/Edit Result]</a></td>
                </tr>";
        if ($class=='main') $class = 'main'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=view'>Back</a><br /><br />
       To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function add(){
global $connection, $AdminID;
$eventdetails_id = $_GET['id'];
$event_id = $_GET['event_id'];
        $query="select distinct club.club_name as club_name,
        crew.crew_id as crew_id,
        crew.crew_designation as crew_designation,
        crew.event_id,
        eventdetails.eventdetails_id as eventdetails_id,
        eventdetails.crew_id,
        eventdetails.event_id,
        eventdetails.eventdetails_result as eventdetails_result,
        eventdetails.eventdetails_time as eventdetails_time
        from club, crew, eventdetails
        where eventdetails_id = '$eventdetails_id' and eventdetails.crew_id = crew.crew_id and club.club_id = crew.club_id";

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Result Update</h2>
        <p>Please update the crews result and time below and click Save when finished.</p>
        <form action='index.php?mode=insert' method='post'>
        <input name='rowcount' type='hidden' value='$num_rows'>
        <table class='ViewTable'>
                <tr>
                        <th>ROWING CLUB/CREW</th>
                        <th>RESULT</th>
                        <th>TIME</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
        $club_name=$row_data["club_name"];
        $crew_id=$row_data["crew_id"];
        $crew_designation=$row_data["crew_designation"];
        $eventdetails_id=$row_data["eventdetails_id"];
        $eventdetails_result=$row_data["eventdetails_result"];
        $eventdetails_time =$row_data["eventdetails_time"];
        echo "<tr class=".$class.">
                        <td><b>$club_name $crew_designation</b></td>
                        <td><select name='eventdetails_result'>
                        <option value='' name=''>Result:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

                        $query1="select * from PickList where pick_title = 'result' order by pick_id";
                        $result1=mysql_query($query1, $connection);
                        $selected_value = $row_data['eventdetails_result'];
                          While ($row_data1 = mysql_fetch_array($result1))
                                {
                                  $Name = $row_data1['pick_name'];
                                  $Value = $row_data1['pick_value'];
                                  if ($selected_value != $Value){
                                        $Selected = "";
                                  }else{
                                        $Selected = "SELECTED";
                                  }
                                  echo"<option value='$Value' name='$Name' $Selected>$Name</option>";
                                }
                        echo"</td>
                        <td><input name='eventdetails_time' type='text' value='".$row_data['eventdetails_time']."'></td>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='mainAlt';
        }
       echo"</table><p>
       <input name='Save' type='submit' value='Save'><br /><br />
       <input type='hidden' name='eventdetails_id' value='".$eventdetails_id."'>
       <input type='hidden' name='event_id' value='".$event_id."'>
       To report an issue please click <a href='../li_contactus.php'>here</a>.</p>
       </form>";
}

function insert(){
         global $connection, $AdminID;
         extract($_POST);
         $query="update eventdetails set eventdetails_result = '".$eventdetails_result."', eventdetails_time =  '".$eventdetails_time."' where eventdetails_id = '".$eventdetails_id."'";
         mysql_query($query,$connection)
                or die ("Unable to perform query<br />$query");
         viewdetails($event_id);
}

?>
