        <?php

function viewclubs(){
        global $connection, $AdminID, $sort, $AdminClub;
        if($_SESSION['level']=="Full"){
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
        }
        if($_SESSION['level']=="Club"){
                $query="select club.club_id as club_id,
                club.club_name as club_name,
                club.club_association as club_association,
                admin.admin_id as admin_id,
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
                where club_name = '$AdminClub' AND admin_id = '$AdminID'";
        }

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Crews</h2>
        <p>The table below shows a list of all rowing clubs currently entered in the south coast championship regatta. To view further details or enter new crews please click “View Registered Crews” for the specific rowing club.<br /><br />If you have any questions you would like to ask an administrator of a rowing club please hover over their name below for contact details.</p>
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
       echo"</table>
       <p>To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function viewdetails($club_id2){
        global $connection, $AdminID, $AdminClub;
        if($_SESSION['level']=="Full"){
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
        }
        if($_SESSION['level']=="Club"){
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
        }

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Crews</h2>
        <p>The table below displays information for the registered crews, the competitors shown are the <b>primary</b> competitors for each crew. To view the substitute competitors please click the link below the table.<br /><br /><a href='index.php?mode=addcrews&id=$club_id'>[Register New Crew]</a></p>

        <table class='ViewTable'>
                <tr>
                        <th>EVENT/CREW</th>
                        <th>EVENT TYPE</th>
                        <th>BOW</th>
                        <th>THREE</th>
                        <th>TWO</th>
                        <th>STROKE</th>
                        <th>COX</th>
                        <th>CONTROL OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $crew_id=$row_data["crew_id"];
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
                        <td><a href='index.php?mode=editcrews&id=$crew_id&id1=$club_id'>[Edit]</a> <a href='javascript:deleteItem(\"./index.php?&mode=deletecrews&id=$crew_id&id1=$club_id\")'>[Delete]</a></td>
              </tr>";

        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=viewdetailssub&id=$club_id'>[View Substitute Competitors]</a><br /><br />";

        if($_SESSION['level']=="Full"){
                                echo"<a href='index.php?mode=view'>Back</a><br /><br />";
                        }
                        if($_SESSION['level']=="Club"){
                                echo"<br />";
                        }
       echo"To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function viewdetailssub($club_id2){
        global $connection, $AdminID, $AdminClub;
        if($_SESSION['level']=="Full"){
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
        }
        if($_SESSION['level']=="Club"){
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
        }

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Crews - Substitute Competitors</h2>
        <p>The table below displays information for the registered crews, the competitors shown are the <b>substitute</b> competitors for each crew. To view the primary competitors please click the link below the table.<br /><br /><a href='index.php?mode=addcrews&id=$club_id'>[Register New Crews]</a></p>

        <table class='ViewTable'>
                <tr>
                        <th>EVENT/CREW</th>
                        <th>EVENT TYPE</th>
                        <th>BOW</th>
                        <th>THREE</th>
                        <th>TWO</th>
                        <th>STROKE</th>
                        <th>COX</th>
                        <th>CONTROL OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $crew_id=$row_data["crew_id"];
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
                        <td><a href='index.php?mode=editcrews&id=$crew_id&id1=$club_id'>[Edit]</a> <a href='javascript:deleteItem(\"./index.php?&mode=deletecrews&id=$crew_id&id1=$club_id\")'>[Delete]</a></td>
              </tr>";

        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=viewdetails&id=$club_id'>[View Primary Competitors]</a><br /><br />";

        if($_SESSION['level']=="Full"){
                                echo"<a href='index.php?mode=view'>Back</a><br /><br />";
                        }
                        if($_SESSION['level']=="Club"){
                                echo"<br />";
                        }
       echo"To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function addcrews(){
       global $connection, $AdminID, $AdminClub;
       $club_id = $_GET['id'];
       echo"
       <h2>Register Crew</h2>
        <p>Please complete the fields below and click save when finished. To return to the previous page please click back.</p>
        <form name='AddCrew' action='index.php?mode=insertcrews' method='post'>
        <table class='contenttable' border='0' width='70%'>
                <tr height='35'>
                        <th>Crew Information</td>
                        <th>Primary Competitors</td>
                        <th>Substitute Competitors</td>
                </tr>
                <tr height='40'>
                        <td><br /><select name='event'>
                        <option value='' name=''>Event&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

                        $query="select * from event";
                        $result=mysql_query($query, $connection);
                          While ($row_data = mysql_fetch_array($result))
                                {
                                  $Name = $row_data['event_name'];
                                  $Value = $row_data['event_id'];
                                  $Type = $row_data['event_type'];
                                  if ($Type == "Championship"){
                                   $Name = $Name." - Championship";
                                  }else if($Type == "Invitation"){
                                   $Name = $Name." - Invitation";
                                  }
                                  echo"<option value='$Value' name='$Name'>$Name</option>";
                                }

                        echo"</select></td>

                        <td>Bow<br /><input name='bow' type='text'></td>
                        <td>Bow<br /><input name='sbow' type='text'></td>
                </tr>
                <tr height='40'>
                        <td><br /><select name='designation'>
                        <option value='' name=''>Crew Designation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

                        $query="select * from PickList where pick_title = 'designation'";
                        $result=mysql_query($query, $connection);
                          While ($row_data = mysql_fetch_array($result))
                                {
                                  $Name = $row_data['pick_name'];
                                  $Value = $row_data['pick_value'];
                                  echo"<option value='$Value' name='$Name'>$Name</option>";
                                }

                        echo"</select></td>
                        <td>Two<br /><input name='two' type='text'></td>
                        <td>Two<br /><input name='stwo' type='text'></td>
                </tr>
                <tr height='40'>
                        <td></td>
                        <td>Three<br /><input name='three' type='text'></td>
                        <td>Three<br /><input name='sthree' type='text'></td>
                </tr>
                <tr height='40'>
                        <td></td>
                        <td>Stroke<br /><input name='stroke' type='text'></td>
                        <td>Stroke<br /><input name='sstroke' type='text'></td>
                </tr>
                <tr height='40'>
                        <td></td>
                        <td>Cox<br /><input name='cox' type='text'></td>
                        <td></td>
                </tr>
        </table>
        <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=viewdetails&id=$club_id'>Back</a></p>
        <input name='club_id' type='hidden' value='$club_id'>
        </form>";
}

function insertcrews(){
         global $connection;
         extract($_POST);
         $query="insert into crew values(0,'$designation', '$club_id', '$event')";
         mysql_query($query,$connection)
               or die ("Unable to perform query<br />$query");
         $newid = mysql_insert_id();

         $query2="insert into competitor values(0,'$bow', '$two', '$three', '$stroke', '$cox', '$sbow', '$stwo', '$sthree', '$sstroke', '$newid')";
         mysql_query($query2,$connection)
               or die ("Unable to perform query<br />$query2");
         $club_id2 = $club_id;
         viewdetails($club_id2);
}

function editcrews(){
       global $connection, $AdminID, $AdminClub;
       $crew_id = $_GET['id'];
       $club_id2 = $_GET['id1'];
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
                WHERE crew.crew_id = $crew_id AND competitor.crew_id = crew.crew_id AND crew.event_id = event.event_id order by event_type, event_id, crew_designation";

       $result = mysql_query($query, $connection);
       $row_data = mysql_fetch_array($result);

       echo"
       <h2>Edit Crew</h2>
       <p>Please update the fields below and click save when finished. To return to the previous page please click back.</p>
       <form action='index.php?mode=updatecrews' method='post'>
       <table class='contenttable' border='0' width='70%'>
                <tr height='35'>
                        <th>Crew Information</td>
                        <th>Primary Competitors</td>
                        <th>Substitute Competitors</td>
                </tr>
                <tr height='40'>
                        <td><br /><select name='event'>
                        <option value='' name=''>Event&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

                        $query1="select * from event";
                        $result1=mysql_query($query1, $connection);
                        $selected_value1 = $row_data['event_id'];
                        While ($row_data1 = mysql_fetch_array($result1))
                                {
                                  $Name = $row_data1['event_name'];
                                  $Value = $row_data1['event_id'];
                                  $Type = $row_data1['event_type'];
                                  if ($Type == "Championship"){
                                   $Name = $Name." - Championship";
                                  }else if($Type == "Invitation"){
                                   $Name = $Name." - Invitation";
                                  }
                                  if ($selected_value1 != $Value){
                                        $Selected1 = "";
                                  }else{
                                        $Selected1 = "SELECTED";
                                  }
                                  echo"<option value='$Value' name='$Name' $Selected1>$Name</option>";
                                }

                        echo"</select></td>

                        <td>Bow<br /><input name='bow' type='text' value='".$row_data['competitor_bow']."'></td>
                        <td>Bow<br /><input name='sbow' type='text' value='".$row_data['competitor_sbow']."'></td>
                </tr>
                <tr height='40'>
                        <td><br /><select name='designation'>
                        <option value='' name=''>Crew Designation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

                        $query2="select * from PickList where pick_title = 'designation'";
                        $result2=mysql_query($query2, $connection);
                        $selected_value = $row_data['crew_designation'];
                                While ($row_data2 = mysql_fetch_array($result2))
                                {
                                  $Name = $row_data2['pick_name'];
                                  $Value = $row_data2['pick_value'];
                                  if ($selected_value != $Value){
                                        $Selected = "";
                                  }else{
                                        $Selected = "SELECTED";
                                  }
                                  echo"<option value='$Value' name='$Name' $Selected>$Name</option>";
                                }

                        echo"</select></td>
                        <td>Two<br /><input name='two' type='text' value='".$row_data['competitor_two']."'></td>
                        <td>Two<br /><input name='stwo' type='text' value='".$row_data['competitor_stwo']."'></td>
                </tr>
                <tr height='40'>
                        <td></td>
                        <td>Three<br /><input name='three' type='text' value='".$row_data['competitor_three']."'></td>
                        <td>Three<br /><input name='sthree' type='text' value='".$row_data['competitor_sthree']."'></td>
                </tr>
                <tr height='40'>
                        <td></td>
                        <td>Stroke<br /><input name='stroke' type='text' value='".$row_data['competitor_stroke']."'></td>
                        <td>Stroke<br /><input name='sstroke' type='text' value='".$row_data['competitor_sstroke']."'></td>
                </tr>
                <tr height='40'>
                        <td></td>
                        <td>Cox<br /><input name='cox' type='text' value='".$row_data['competitor_cox']."'></td>
                        <td></td>
                </tr>
        </table>
        <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=viewdetails&id=$club_id2'>Back</a></p>
        <input name='crew_id' type='hidden' value='$crew_id'>
        <input name='club_id2' type='hidden' value='$club_id2'>
        </form>";
}

function updatecrews(){
         global $connection;
         extract($_POST);

         $query="update crew set crew_designation ='".$designation."', event_id ='".$event."' where crew_id = '".$crew_id."'";
         mysql_query($query,$connection)
               or die ("Unable to perform query<br />$query");

        $query2="update competitor set competitor_bow = '".$bow."', competitor_two = '".$two."', competitor_three = '".$three."', competitor_stroke = '".$stroke."', competitor_cox = '".$cox."', competitor_sbow = '".$sbow."', competitor_stwo = '".$stwo."', competitor_sthree = '".$sthree."', competitor_sstroke = '".$sstroke."' where crew_id = '".$crew_id."'";
        mysql_query($query2,$connection)
               or die ("Unable to perform query<br />$query2");
        viewdetails($club_id2);
}

function deletecrews(){
        global $connection;
        $crew_id = $_GET['id'];
        $club_id = $_GET['id1'];
        $query = "delete from crew where crew_id = ".$crew_id;
        $result = @mysql_query($query, $connection)
                or die ("Unable to perform query<br />$query");

        $query1 = "delete from competitor where crew_id = ".$crew_id;
        $result = @mysql_query($query1, $connection)
                or die ("Unable to perform query<br />$query1");
        $club_id2 = $club_id;
        viewdetails($club_id2);
}

?>
