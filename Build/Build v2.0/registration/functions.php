<?php

function viewclubs(){
        global $connection, $AdminID, $AdminClub;
        if($_SESSION['level']=="Full"){
                $query="select club.club_id as club_id,
                club.club_name as club_name,
                club.club_association as club_association,
                admin.admin_club as admin_club,
                admin.admin_forename as admin_forename,
                admin.admin_surname as admin_surname,
                admin.admin_level as admin_level
                from club, admin
                where club.club_name = admin.admin_club
                AND admin.admin_level = 'Club'";
        }
        if($_SESSION['level']=="Club"){
                $query="select club.club_id as club_id,
                club.club_name as club_name,
                club.club_association as club_association,
                admin.admin_club as admin_club,
                admin.admin_forename as admin_forename,
                admin.admin_surname as admin_surname
                from club, admin
                where club_name = '$AdminClub' AND admin.admin_id = $AdminID";
        }

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Crews</h2>
        <p>Please select a rowing club below to view their registerd crews.</p>

        <table class='ViewTable'>
                <tr>
                        <th>ROWING CLUB</th>
                        <th>ASSOCIATION</th>
                        <th>ADMINISTRATOR</th>
                        <th>OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $club_id=$row_data["club_id"];
                $club_name=$row_data["club_name"];
                $club_association=$row_data["club_association"];
                $admin_forename=$row_data["admin_forename"];
                $admin_surname=$row_data["admin_surname"];
        echo "<tr class=".$class.">
                        <td>$club_name</td>
                        <td>$club_association</td>
                        <td>$admin_forename&nbsp;$admin_surname</td>
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
                crew.crew_name AS crew_name,
                crew.crew_regatta AS crew_regatta,
                crew.crew_designation AS crew_designation,
                competitor.competitor_bow AS competitor_bow,
                competitor.competitor_two AS competitor_two,
                competitor.competitor_three AS competitor_three,
                competitor.competitor_stroke AS competitor_stroke,
                competitor.competitor_cox AS competitor_cox,
                competitor.competitor_sbow AS competitor_sbow,
                competitor.competitor_stwo AS competitor_stwo,
                competitor.competitor_sthree AS competitor_sthree,
                competitor.competitor_sstroke AS competitor_sstroke
                FROM crew, competitor
                WHERE crew.club_id = $club_id AND competitor.crew_id = crew.crew_id";
        }
        if($_SESSION['level']=="Club"){
                if(isset($club_id2)){
                $club_id = $club_id2;
                }else{
                $club_id = $_GET['id'];
                }
                $query="SELECT crew.crew_id AS crew_id,
                crew.crew_name AS crew_name,
                crew.crew_regatta AS crew_regatta,
                crew.crew_designation AS crew_designation,
                competitor.competitor_bow AS competitor_bow,
                competitor.competitor_two AS competitor_two,
                competitor.competitor_three AS competitor_three,
                competitor.competitor_stroke AS competitor_stroke,
                competitor.competitor_cox AS competitor_cox,
                competitor.competitor_sbow AS competitor_sbow,
                competitor.competitor_stwo AS competitor_stwo,
                competitor.competitor_sthree AS competitor_sthree,
                competitor.competitor_sstroke AS competitor_sstroke
                FROM crew, competitor
                WHERE crew.club_id = $club_id AND competitor.crew_id = crew.crew_id";
        }

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Crews</h2>
        <p>The table below displays information for the registered crews, the competitors shown are the <b>primary</b> competitors for each crew. To view the substitute competitors please click the link below the table.<br /><br /><a href='index.php?mode=addcrews&id=$club_id'>[Register New Crews]</a></p>

        <table class='ViewTable'>
                <tr>
                        <th>CREW</th>
                        <th>REGATTA</th>
                        <th>BOW</th>
                        <th>THREE</th>
                        <th>TWO</th>
                        <th>STROKE</th>
                        <th>COX</th>
                        <th>OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $crew_name=$row_data["crew_name"];
                $crew_regatta=$row_data["crew_regatta"];
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
                        <td><b>$crew_name $crew_designation</b></td>
                        <td>$crew_regatta</td>
                        <td>$competitor_bow</td>
                        <td>$competitor_two</td>
                        <td>$competitor_three</td>
                        <td>$competitor_stroke</td>
                        <td>$competitor_cox</td>
                        <td><a href='#'>[Edit]</a> <a href='#'>[Delete]</a></td>
              </tr>";

        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=viewdetailssub&id=$club_id'>[View Substitute Crews]</a><br /><br />";

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
                crew.crew_name AS crew_name,
                crew.crew_regatta AS crew_regatta,
                crew.crew_designation AS crew_designation,
                competitor.competitor_bow AS competitor_bow,
                competitor.competitor_two AS competitor_two,
                competitor.competitor_three AS competitor_three,
                competitor.competitor_stroke AS competitor_stroke,
                competitor.competitor_cox AS competitor_cox,
                competitor.competitor_sbow AS competitor_sbow,
                competitor.competitor_stwo AS competitor_stwo,
                competitor.competitor_sthree AS competitor_sthree,
                competitor.competitor_sstroke AS competitor_sstroke
                FROM crew, competitor
                WHERE crew.club_id = $club_id AND competitor.crew_id = crew.crew_id";
        }
        if($_SESSION['level']=="Club"){
                if(isset($club_id2)){
                $club_id = $club_id2;
                }else{
                $club_id = $_GET['id'];
                }
                $query="SELECT crew.crew_id AS crew_id,
                crew.crew_name AS crew_name,
                crew.crew_regatta AS crew_regatta,
                crew.crew_designation AS crew_designation,
                competitor.competitor_bow AS competitor_bow,
                competitor.competitor_two AS competitor_two,
                competitor.competitor_three AS competitor_three,
                competitor.competitor_stroke AS competitor_stroke,
                competitor.competitor_cox AS competitor_cox,
                competitor.competitor_sbow AS competitor_sbow,
                competitor.competitor_stwo AS competitor_stwo,
                competitor.competitor_sthree AS competitor_sthree,
                competitor.competitor_sstroke AS competitor_sstroke
                FROM crew, competitor
                WHERE crew.club_id = $club_id AND competitor.crew_id = crew.crew_id";
        }

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        echo"
        <h2>Registered Crews - Substitute Competitors</h2>
        <p>The table below displays information for the registered crews, the competitors shown are the <b>substitute</b> competitors for each crew. To view the primary competitors please click the link below the table.<br /><br /><a href='index.php?mode=addcrews&id=$club_id'>[Register New Crews]</a></p>

        <table class='ViewTable'>
                <tr>
                        <th>CREW</th>
                        <th>REGATTA</th>
                        <th>BOW</th>
                        <th>THREE</th>
                        <th>TWO</th>
                        <th>STROKE</th>
                        <th>COX</th>
                        <th>OPTIONS</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $crew_name=$row_data["crew_name"];
                $crew_regatta=$row_data["crew_regatta"];
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
                        <td><b>$crew_name $crew_designation</b></td>
                        <td>$crew_regatta</td>
                        <td>$competitor_sbow</td>
                        <td>$competitor_stwo</td>
                        <td>$competitor_sthree</td>
                        <td>$competitor_sstroke</td>
                        <td>$competitor_cox</td>
                        <td><a href='#'>[Edit]</a> <a href='#'>[Delete]</a></td>
              </tr>";

        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table><p><a href='index.php?mode=viewdetails&id=$club_id'>[View Primary Crews]</a><br /><br />";

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
       <h2>Register Crews</h2>
        <p>Please complete the fields below and click save when finished. To return to the previous page please click back.</p>
        <form action='index.php?mode=insertcrews' method='post'>
        <table class='contenttable' border='0' width='70%'>
                <tr height='35'>
                        <th>Crew Information</td>
                        <th>Primary Competitors</td>
                        <th>Substitute Competitors</td>
                </tr>
                <tr height='40'>
                        <td>Regatta<br /><select name='regatta'>
                        <option value='' name=''>Regatta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

                        $query="select * from PickList where pick_title = 'regatta'";
                        $result=mysql_query($query, $connection);
                          While ($row_data = mysql_fetch_array($result))
                                {
                                  $Name = $row_data['pick_name'];
                                  $Value = $row_data['pick_value'];
                                  echo"<option value='$Value' name='$Name'>$Name</option>";
                                }

                        echo"</select></td>

                        <td>Bow<br /><input name='bow' type='text'></td>
                        <td>Bow<br /><input name='sbow' type='text'></td>
                </tr>
                <tr height='40'>
                        <td>Crew / Event<br /><select name='crew'>
                        <option value='' name=''>Crew&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

                        $query="select * from PickList where pick_title = 'crew'";
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
                        <td>Designation<br /><select name='designation'>
                        <option value='' name=''>Designation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

                        $query="select * from PickList where pick_title = 'designation'";
                        $result=mysql_query($query, $connection);
                          While ($row_data = mysql_fetch_array($result))
                                {
                                  $Name = $row_data['pick_name'];
                                  $Value = $row_data['pick_value'];
                                  echo"<option value='$Value' name='$Name'>$Name</option>";
                                }

                        echo"</select></td>

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
        <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=view'>Back</a></p>
        <input name='club_id' type='hidden' value='$club_id'>
        </form>";
}

function insertcrews(){
         global $connection;
         extract($_POST);
         $query="insert into crew values(0,'$regatta', '$crew', '$designation', '$club_id')";
         mysql_query($query,$connection)
               or die ("Unable to perform query<br />$query");
         $newid = mysql_insert_id();
         $query2="insert into competitor values(0,'$bow', '$two', '$three', '$stroke', '$cox', '$sbow', '$stwo', '$sthree', '$sstroke', '$newid')";
         mysql_query($query2,$connection)
               or die ("Unable to perform query<br />$query2");
               $club_id2 = $club_id;
         viewdetails($club_id2);
}

?>
