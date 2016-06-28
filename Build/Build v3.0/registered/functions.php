<?php

function viewclubs(){
        global $connection, $sort, $AdminID, $AdminClub;
                $query="select club.club_id as club_id,
                club.club_name as club_name,
                club.club_association as club_association,
                admin.admin_club as admin_club,
                admin.admin_forename as admin_forename,
                admin.admin_surname as admin_surname,
                admin.admin_addressone as admin_addressone,
                admin.admin_addresstwo as admin_addresstwo,
                admin.admin_city as admin_city,
                admin.admin_county as admin_county,
                admin.admin_postcode as admin_postcode,
                admin.admin_phone as admin_phone,
                admin.admin_email as admin_email,
                admin.admin_level as admin_level
                from club, admin
                where club.club_name = admin.admin_club
                AND admin.admin_level = 'Club' order by '".$sort."'";

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Clubs</h2>
        <p>The table below shows a list of all rowing clubs currently entered in the south coast championship regatta. To view further details please click “View Registered Crews” for the specific rowing club.<br /><br />If you have any questions you would like to ask an administrator of a rowing club please hover over their name below for contact details.</p>

        <table class='ViewTable'>
                <tr>
                        <th><a href='index.php?mode=view&sort=club_name' title='Sort' style='color:#fff;'>ROWING CLUB</a></th>
                        <th><a href='index.php?mode=view&sort=club_association' title='Sort' style='color:#fff;'>ASSOCIATION</a></th>
                        <th><a href='index.php?mode=view&sort=admin_forename' title='Sort' style='color:#fff;'>ADMINISTRATOR</a></th>
                        <th>CONTROL OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $club_id=$row_data["club_id"];
                $club_name=$row_data["club_name"];
                $club_association=$row_data["club_association"];
                $admin_forename=$row_data["admin_forename"];
                $admin_surname=$row_data["admin_surname"];
                $AddressOne=$row_data["admin_addressone"];
                $AddressTwo=$row_data["admin_addresstwo"];
                $City=$row_data["admin_city"];
                $County=$row_data["admin_county"];
                $Postcode=$row_data["admin_postcode"];
                $Phone=$row_data["admin_phone"];
                $admin_email=$row_data["admin_email"];
        echo "<tr class=".$class.">
                        <td>$club_name</td>
                        <td>$club_association</td>
                        <td><div id='dhtmlfloatie'></div>";?><a href="#" onMouseover="showfloatie('<? echo $admin_forename." ".$admin_surname." <br /><br /><b>Address:</b><br /> ".$AddressOne." <br /> ".$AddressTwo." <br /> ".$City." <br /> ".$County." <br /> ".$Postcode." <br /><br /> <b>Phone:</b> <br /> ".$Phone." <br /><br /> <b>E-Mail:</b> <br /> ".$admin_email.""; ?>', event)" onMouseout="hidefloatie()" style="text-decoration:none; cursor:pointer;"><? echo $admin_forename." ".$admin_surname."</a></td>
                        <td><a href='index.php?mode=viewdetails&id=$club_id'>[View Registered Crews]</a></td>
              </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p>To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function viewdetails($club_id2){
        global $connection, $sort, $AdminID, $AdminClub;
                if(isset($club_id2)){
                $club_id = $club_id2;
                }else{
                $club_id = $_GET['id'];
                }
                $query="SELECT crew.crew_id AS crew_id,
                crew.crew_designation AS crew_designation,
                event.event_id AS event_id,
                event.event_name AS event_name,
                event.event_type AS event_type,
                competitor.competitor_bow AS competitor_bow,
                competitor.competitor_two AS competitor_two,
                competitor.competitor_three AS competitor_three,
                competitor.competitor_stroke AS competitor_stroke,
                competitor.competitor_cox AS competitor_cox,
                competitor.competitor_sbow AS competitor_sbow,
                competitor.competitor_stwo AS competitor_stwo,
                competitor.competitor_sthree AS competitor_sthree,
                competitor.competitor_sstroke AS competitor_sstroke
                FROM crew, event, competitor
                WHERE crew.club_id = $club_id AND competitor.crew_id = crew.crew_id AND crew.event_id = event.event_id order by event_type, event_id, crew_designation";

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Crews</h2>
        <p>The table below displays information for the registered crews, the competitors shown are the <b>primary</b> competitors for each crew. To view the substitute competitors please click the link below the table.</p>

        <table class='ViewTable'>
                <tr>
                        <th>EVENT/CREW</th>
                        <th>EVENT TYPE</th>
                        <th>BOW</th>
                        <th>THREE</th>
                        <th>TWO</th>
                        <th>STROKE</th>
                        <th>COX</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $event_name=$row_data["event_name"];
                $event_type=$row_data["event_type"];
                $crew_designation=$row_data["crew_designation"];
                $competitor_bow=$row_data["competitor_bow"];
                $competitor_two=$row_data["competitor_two"];
                $competitor_three=$row_data["competitor_three"];
                $competitor_stroke=$row_data["competitor_stroke"];
                $competitor_cox=$row_data["competitor_cox"];
                $competitor_sbow=$row_data["competitor_sbow"];
                $competitor_stwo=$row_data["competitor_stwo"];
                $competitor_sthree=$row_data["competitor_sthree"];
                $competitor_sstroke=$row_data["competitor_sstroke"];

        echo "<tr class=".$class.">
                        <td><b>$event_name $crew_designation</b></td>
                        <td><b>$event_type</b></td>
                        <td>$competitor_bow</td>
                        <td>$competitor_two</td>
                        <td>$competitor_three</td>
                        <td>$competitor_stroke</td>
                        <td>$competitor_cox</td>
              </tr>";

        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=viewdetailssub&id=$club_id'>[View Substitute Crews]</a><br /><br /><a href='index.php?mode=view'>Back</a><br /><br />To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

function viewdetailssub($club_id2){
        global $connection, $AdminID, $AdminClub;
                if(isset($club_id2)){
                $club_id = $club_id2;
                }else{
                $club_id = $_GET['id'];
                }
                $query="SELECT crew.crew_id AS crew_id,
                crew.crew_designation AS crew_designation,
                event.event_id AS event_id,
                event.event_name AS event_name,
                event.event_type AS event_type,
                competitor.competitor_bow AS competitor_bow,
                competitor.competitor_two AS competitor_two,
                competitor.competitor_three AS competitor_three,
                competitor.competitor_stroke AS competitor_stroke,
                competitor.competitor_cox AS competitor_cox,
                competitor.competitor_sbow AS competitor_sbow,
                competitor.competitor_stwo AS competitor_stwo,
                competitor.competitor_sthree AS competitor_sthree,
                competitor.competitor_sstroke AS competitor_sstroke
                FROM crew, event, competitor
                WHERE crew.club_id = $club_id AND competitor.crew_id = crew.crew_id AND crew.event_id = event.event_id order by event_type, event_id, crew_designation";

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Crews - Substitute Competitors</h2>
        <p>The table below displays information for the registered crews, the competitors shown are the <b>substitute</b> competitors for each crew. To view the primary competitors please click the link below the table.</p>

        <table class='ViewTable'>
                <tr>
                        <th>EVENT/CREW</th>
                        <th>EVENT TYPE</th>
                        <th>BOW</th>
                        <th>THREE</th>
                        <th>TWO</th>
                        <th>STROKE</th>
                        <th>COX</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $event_name=$row_data["event_name"];
                $event_type=$row_data["event_type"];
                $crew_designation=$row_data["crew_designation"];
                $competitor_bow=$row_data["competitor_bow"];
                $competitor_two=$row_data["competitor_two"];
                $competitor_three=$row_data["competitor_three"];
                $competitor_stroke=$row_data["competitor_stroke"];
                $competitor_cox=$row_data["competitor_cox"];
                $competitor_sbow=$row_data["competitor_sbow"];
                $competitor_stwo=$row_data["competitor_stwo"];
                $competitor_sthree=$row_data["competitor_sthree"];
                $competitor_sstroke=$row_data["competitor_sstroke"];

        echo "<tr class=".$class.">
                        <td><b>$event_name $crew_designation</b></td>
                        <td><b>$event_type</b></td>
                        <td>$competitor_sbow</td>
                        <td>$competitor_stwo</td>
                        <td>$competitor_sthree</td>
                        <td>$competitor_sstroke</td>
                        <td>$competitor_cox</td>
              </tr>";

        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=viewdetails&id=$club_id'>[View Primary Crews]</a><br /><br /><a href='index.php?mode=view'>Back</a><br /><br />To report an issue please click <a href='../contactus.php'>here</a>.</p>";
}

?>
