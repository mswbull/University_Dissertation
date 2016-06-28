<?php

function viewclubs(){
global $connection, $sort, $AdminID;
$query="select * from club order by '".$sort."'";
$result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
echo"
        <h2>Registered Rowing Clubs</h2>
        <p>The table below displays information and control options for the rowing clubs that have registered.<br /><br /><a href='index.php?mode=addclub'>[Register New Rowing Club]</a></p>

        <table class='ViewTable'>
                <tr>
                        <th><a href='index.php?mode=viewclubs&sort=club_name' title='Sort' style='color:#fff;'>ROWING CLUB</a></th>
                        <th><a href='index.php?mode=viewclubs&sort=club_association' title='Sort' style='color:#fff;'>ASSOCIATION</a></th>
                        <th>OPTIONS</th>
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
                        <td><a href='index.php?mode=editclub&id=$club_id'>[Edit]</a> - <a href='javascript:deleteItem(\"./index.php?&mode=deleteclub&id=$club_id\")'>[Delete]</a></td>
              </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table>
       <p>To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function addclub(){
        global $connection;
        echo"
        <h2>Register Rowing Clubs</h2>
        <p>Please complete the fields below and click “Save” when finished. To return to the previous page please click “Back”.</p>
        <form action='index.php?mode=insertclub' method='post'>
        <table class='contenttable' border='0'>
                <tr>
                        <td width='200'>Rowing Club Name:<br /><input name='club_name' type='text'></td>
                        <td>Association:<br /><select name='club_association'>";

                        $query="select * from PickList where pick_title = 'association'";
                        $result=mysql_query($query, $connection);
                          While ($row_data = mysql_fetch_array($result))
                                {
                                  $Name = $row_data['pick_name'];
                                  $Value = $row_data['pick_name'];
                                  echo"<option value='$Value' name='$Name'>$Name&nbsp;&nbsp;&nbsp;</option>";
                                }

                        echo"</select></td>
                </tr>
        </table>
        <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=viewclubs'>Back</a></p>
        </form>";
}

function insertclub(){
         global $connection;
         extract($_POST);
         $query="insert into club values(0,'".$club_name."', '".$club_association."')";
         mysql_query($query,$connection)
               or die ("Unable to perform query<br />$query");
         viewclubs();
}

function editclub(){
        global $connection;
        $ID = $_GET['id'];
        $query = "select * from club WHERE club_id = $ID";
        $result = mysql_query($query, $connection);
        $row_data = mysql_fetch_array($result);
echo"
        <h2>Edit Rowing Clubs</h2>
        <p>Please update the fields below and click “Save” when finished. To return to the previous page please click “Back”.</p>
        <form action='index.php?mode=updateclub&id=$ID' method='post'>
        <table class='contenttable' border='0'>
                <tr>
                        <td width='200'>Rowing Club Name:<br /><input name='club_name' type='text' value='".$row_data['club_name']."'></td>
                        <td>Association:<br /><select name='club_association'>";

                        $query="select * from PickList where pick_title = 'association'";
                        $result=mysql_query($query, $connection);
                        $selected_value = $row_data['club_name'];
                         While ($row_data = mysql_fetch_array($result))
                                {
                                  $Name = $row_data['pick_name'];
                                  $Value = $row_data['pick_name'];
                                  if ($selected_value != $Value){
                                        $Selected = "";
                                  }else{
                                        $Selected = "SELECTED";
                                  }
                                  echo"<option value='$Value' name='$Name' $Selected>$Name&nbsp;&nbsp;&nbsp;</option>";
                                }

                        echo"</select></td>
                </tr>
        </table>
        <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=viewclubs'>Back</a></p>
        <input type='hidden' name='club_id' value='$ID'>
        </form>";
}

function updateclub(){
        global $connection;
        extract($_POST);
        $query="update club set club_name ='".$club_name."', club_association = '".$club_association."' where club_id = '".$club_id."'";
        $result=mysql_query($query,$connection);
        viewclubs();
}

function deleteclub(){
        global $connection;
        $ID = $_GET['id'];
        $query = "delete from club where club_id = ".$ID;
        $result = @mysql_query($query, $connection)
                or die ("Unable to perform query<br />$query");
        viewclubs();
}

?>
