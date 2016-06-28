<?php

function view(){
global $connection, $AdminID;
        $query="select distinct crew_regatta as crew_regatta, crew_name as crew_name from crew order by crew_regatta";
$result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Events</h2>
        <p>The table below displays the events that have been created for the regatta.<br /><br /><a href='index.php?mode=addevent'>[Create New Event]</a></p>

        <table class='ViewTable'>
                <tr>
                        <th>EVENT</th>
                        <th>REGATTA TYPE</th>
                        <th>OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $crew_regatta=$row_data["crew_regatta"];
                $crew_name=$row_data["crew_name"];
        echo "<tr class=".$class.">
                        <td>$crew_name</td>
                        <td>$crew_regatta</td>
                        <td><a href='index.php?mode=viewdetails&id=$crew_name'>[Details]</a></td>
              </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table>
       <p>To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function viewdetails(){
global $connection, $AdminID;
        $query="select crew_regatta as crew_regatta, crew_name as crew_name from crew order by crew_regatta";
$result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Events</h2>
        <p>The table below displays the events that have been created for the regatta.<br /><br /><a href='index.php?mode=addevent'>[Create New Event]</a></p>

        <table class='ViewTable'>
                <tr>
                        <th>CREW NAME</th>
                        <th>BOW</th>
                        <th>TWO</th>
                        <th>THREE</th>
                        <th>STROKE</th>
                        <th>COX</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $crew_name=$row_data["crew_name"];
        echo "<tr class=".$class.">
                        <td>$crew_name</td>
                        <th>BOW</th>
                        <th>TWO</th>
                        <th>THREE</th>
                        <th>STROKE</th>
                        <th>COX</th>
                </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table>
       <p>To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}
?>
