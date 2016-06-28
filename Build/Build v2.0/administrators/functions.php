<?php

function viewAdministrators(){
        global $connection, $AdminID;
        if($_SESSION['level']=="Full"){
                $query="select * from admin";
        }
        if($_SESSION['level']=="Club"){
                $query="select * from admin where admin_id = $AdminID";
        }

        $result=mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");
        echo "
             <h2>Administrator Accounts</h2>
             <p>The table below displays information and control options for the administrator accounts you have access to. ";

             if($_SESSION['level']=="Full"){
                                echo"<p><a href='index.php?mode=add'>[Add Administrator]</a></p>";
                        }
                        if($_SESSION['level']=="Club"){
                                echo"<br />";
                        }
        echo"
             <table class='ViewTable'>
                <tr>
                        <th>NAME</th>
                        <th>USERNAME</th>
                        <th>ROWING CLUB</th>
                        <th>LEVEL</th>
                        <th>CONTROL</th>
                </tr>";
        $class = "mainAlt";
        While ($row_data = mysql_fetch_array($result))
        {
                $ID=$row_data["admin_id"];
                $Username=$row_data["username"];
                $Password=$row_data["password"];
                $Forename=$row_data["admin_forename"];
                $Surname=$row_data["admin_surname"];
                $Club=$row_data["admin_club"];
                $Level=$row_data["admin_level"];
        echo "<tr class=".$class.">
                        <td>$Forename&nbsp;$Surname</td>
                        <td>$Username</td>
                        <td>$Club</td>
                        <td>$Level</td>
                        <td>";
                        if($_SESSION['level']=="Full"){
                                echo"<a href='index.php?mode=edit&id=$ID'>[Edit]</a> <a href='javascript:deleteItem(\"./index.php?&mode=delete&id=$ID\")'>[Delete]</a>";
                        }
                        if($_SESSION['level']=="Club"){
                                echo"<a href='index.php?mode=edit&id=$ID'>[Edit]</a>";
                        }

                        echo"</td>
              </tr>";
        if ($class=='main') $class = 'mainAlt'; else $class='main';
        }
       echo"</table>";
                       
       echo"<p>To report an issue please click <a href='../li_contactus.php'>here</a>.</p>";
}

function addAdminstrators(){
        global $connection;
        echo"
        <h2>Add Administrator</h2>
        <p>Please complete the fields below and click save when finished. To return to the previous page please click back.</p>
        <form action='index.php?mode=insert' method='post'>
        <table class='contenttable' border='0'>
                <tr>
                        <td width='200'>Username:<br /><input name='username' type='text'></td>
                        <td>Registered Club:<br /><select name='club'>";

                        $query="select * from club";
                        $result=mysql_query($query, $connection);
                          While ($row_data = mysql_fetch_array($result))
                                {
                                  $Name = $row_data['club_name'];
                                  $Value = $row_data['club_name'];
                                  echo"<option value='$Value' name='$Name'>$Name</option>";
                                }

                        echo"</select></td>
                </tr>
                <tr>
                        <td>Password:<br /><input name='password' type='password'></td>

                </tr>
                <tr>
                        <td>Forename:<br /><input name='forename' type='text'></td>
                </tr>
                <tr>
                        <td>Surname:<br /><input name='surname' type='text'></td>
                        <td>Administrator Level:<br /><select name='level'>";

                        $query="select * from PickList where pick_title = 'level'";
                        $result=mysql_query($query, $connection);
                          While ($row_data = mysql_fetch_array($result))
                                {
                                  $Name = $row_data['pick_name'];
                                  $Value = $row_data['pick_value'];
                                  echo"<option value='$Value' name='$Name'>$Name</option>";
                                }

                        echo"</select></td>
         </tr>
        </table>
        <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=view'>Back</a></p>
        </form>";
}

function insertAdminstrators(){
         global $connection;
         extract($_POST);
         $query="insert into admin values(0,'".$username."', '".$password."', '".$forename."', '".$surname."', '".$club."', '".$level."')";
         mysql_query($query,$connection)
               or die ("Unable to perform query<br />$query");
         viewAdministrators();
}

function editAdministrators(){
         global $connection;
         $ID = $_GET['id'];
         $query = "select * from admin WHERE admin_id = $ID";
         $result = mysql_query($query, $connection);
         $row_data = mysql_fetch_array($result);
echo"
         <h2>Edit Administrator</h2>
         <p>Please update the fields below and click save when finished. To return to the previous page please click back.</p>
         <form action='index.php?mode=update&id=$ID' method='post'>
         <table class='contenttable' border='0'>
                <tr>
                        <td width='200'>Username:<br /><input name='username' type='text' value='".$row_data['username']."'></td>
                        <td>Registered Club:<br /><select name='club'>";

                        $query4="select * from club";
                        $result4=mysql_query($query4, $connection);
                        $selected_value = $row_data['admin_club'];
                          While ($row_data4 = mysql_fetch_array($result4))
                                {
                                  $Name = $row_data4['club_name'];
                                  $Value = $row_data4['club_name'];
                                  if ($selected_value != $Value){
                                        $Selected = "";
                                  }else{
                                        $Selected = "SELECTED";
                                  }
                                  echo"<option value='$Value' name='$Name' $Selected>$Name</option>";
                                }

                        echo"</select></td>
                </tr>
                <tr>
                        <td>Password:<br /><input name='password' type='text' value='".$row_data['password']."'></td>
                </tr>
                <tr>
                        <td>Forename:<br /><input name='forename' type='text' value='".$row_data['admin_forename']."'></td>
                </tr>
                <tr>
                        <td>Surname:<br /><input name='surname' type='text' value='".$row_data['admin_surname']."'></td>
                        <td>Administrator Level:<br /><select name='level'>";

                        $query3="select * from PickList where pick_title = 'level'";
                        $result3=mysql_query($query3, $connection);
                        $selected_value = $row_data['admin_level'];
                          While ($row_data3 = mysql_fetch_array($result3))
                                {
                                  $Name = $row_data3['pick_name'];
                                  $Value = $row_data3['pick_value'];
                                  if ($selected_value != $Value){
                                        $Selected = "";
                                  }else{
                                        $Selected = "SELECTED";
                                  }
                                  echo"<option value='$Value' name='$Name' $Selected>$Name</option>";
                                }

                        echo"</select></td>
                 </tr>
         </table>
         <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=view'>Back</a></p>
         <input type='hidden' name='admin_id' value='".$row_data['admin_id']."'>
         </form>";
}

function updateAdminstrators(){
        global $connection;
        extract($_POST);
        $query="update admin set username ='".$username."', password = '".$password."', admin_forename = '".$forename."', admin_surname = '".$surname."', admin_club = '".$club."', admin_level = '".$level."' where admin_id = '".$admin_id."'";
        $result=mysql_query($query,$connection);
        viewAdministrators();
}

function deleteAdminstrators(){
        global $connection;
        $ID = $_GET['id'];
        $query = "delete from admin where admin_id = ".$ID;
        $result = @mysql_query($query, $connection)
                or die ("Unable to perform query<br />$query");
        viewAdministrators();
}

?>
