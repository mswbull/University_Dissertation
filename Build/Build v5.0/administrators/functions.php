<?php

function viewAdministrators(){
        global $connection, $sort, $AdminID;
        if($_SESSION['level']=="Full"){
                $query="select * from admin order by '".$sort."'";
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
                        <th><a href='index.php?mode=view&sort=admin_forename' title='Sort' style='color:#fff;'>NAME</a></th>
                        <th><a href='index.php?mode=view&sort=username' title='Sort' style='color:#fff;'>USERNAME</a></th>
                        <th><a href='index.php?mode=view&sort=admin_club' title='Sort' style='color:#fff;'>ROWING CLUB</a></th>
                        <th><a href='index.php?mode=view&sort=admin_email' title='Sort' style='color:#fff;'>E-MAIL</a></th>
                        <th><a href='index.php?mode=view&sort=admin_level' title='Sort' style='color:#fff;'>LEVEL</a></th>
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
                $AddressOne=$row_data["admin_addressone"];
                $AddressTwo=$row_data["admin_addresstwo"];
                $City=$row_data["admin_city"];
                $County=$row_data["admin_county"];
                $Postcode=$row_data["admin_postcode"];
                $Phone=$row_data["admin_phone"];
                $Email=$row_data["admin_email"];
                $Club=$row_data["admin_club"];
                $Level=$row_data["admin_level"];
        echo "<tr class=".$class.">
                        <td><div id='dhtmlfloatie'></div>";?><a href="#" onMouseover="showfloatie('<? echo $Forename." ".$Surname." <br /><br /><b>Address:</b><br /> ".$AddressOne." <br /> ".$AddressTwo." <br /> ".$City." <br /> ".$County." <br /> ".$Postcode." <br /><br /> <b>Phone:</b> <br /> ".$Phone." <br /><br /> <b>E-Mail:</b> <br /> ".$Email.""; ?>', event)" onMouseout="hidefloatie()" style="text-decoration:none; cursor:pointer;"><? echo $Forename." ".$Surname."</a></td>
                        <td>$Username</td>
                        <td>$Club</td>
                        <td><a href='mailto:$Email'>$Email</a></td>
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
        <form name='myForm' action='index.php?mode=insert' onSubmit='return validatePwd()' method='post'>
        <table class='contenttable' border='0'>
                <tr>
                        <td width='200'>Username:<br /><input name='username' type='text'></td>
                        <td width='200'>Address Line One:<br /><input name='addressone' type='text'></td>
                        <td width='200'><br /><select name='club'>
                        <option value='' name=''>Registered Club:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

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
                        <td>Password:<br /><input type=password name=password maxlength=12></td>
                        <td>Address Line Two:<br /><input name='addresstwo' type='text'></td>
                        <td><br /><select name='level'>
                        <option value='' name=''>Administrator Level:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

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
                <tr>
                        <td>Confirm Password:<br /><input type=password name=password2 maxlength=12></td>
                        <td>City:<br /><input name='city' type='text'></td>
                </tr>
                <tr>

                        <td>Forename:<br /><input name='forename' type='text'></td>
                        <td>County:<br /><input name='county' type='text'></td>
                </tr>
                <tr>
                        <td>Surname:<br /><input name='surname' type='text'></td>
                        <td>Postcode:<br /><input name='postcode' type='text'></td>
                </tr>
                <tr>
                        <td>E-Mail:<br /><input name='email' type='text'></td>
                        <td>Phone:<br /><input name='phone' type='text'></td>
                </tr>
        </table>
        <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=view'>Back</a></p>
        </form>";
}

function insertAdminstrators(){
         global $connection;
         extract($_POST);
         $query="insert into admin values(0,'".$username."', '".$password."', '".$forename."', '".$surname."', '".$addressone."', '".$addresstwo."', '".$city."', '".$county."', '".$postcode."', '".$phone."', '".$email."', '".$club."', '".$level."')";
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
         <form name='myForm' action='index.php?mode=update&id=$ID' onSubmit='return validatePwd()' method='post'>
         <table class='contenttable' border='0'>
                <tr>
                        <td width='200'>Username:<br /><input name='username' type='text' value='".$row_data['username']."'></td>
                        <td width='200'>Address Line One:<br /><input name='addressone' type='text' value='".$row_data['admin_addressone']."'></td>";

                        if($_SESSION['level']=="Full"){
                        echo" <td><br /><select name='club'>
                        <option value='' name=''>Registered Club:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

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

                        echo"</select></td>";
                        }

                        if($_SESSION['level']=="Club"){
                                echo"<td></td>";
                        }
                echo" </tr>
                <tr>
                        <td>Password:<br /><input type=password name=password maxlength=12 value='".$row_data['password']."'></td>
                        <td>Address Line Two:<br /><input name='addresstwo' type='text' value='".$row_data['admin_addresstwo']."'></td>";

                        if($_SESSION['level']=="Full"){
                        echo" <td><br /><select name='level'>
                        <option value='' name=''>Administrator Level:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";

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

                        echo"</select></td>";
                        }

                        if($_SESSION['level']=="Club"){
                                echo"<td></td>";
                        }
                echo" </tr>
                <tr>
                        <td>Confirm Password:<br /><input type=password name=password2 maxlength=12 value='".$row_data['password']."'></td>
                        <td>City:<br /><input name='city' type='text' value='".$row_data['admin_city']."'></td>
                </tr>
                <tr>
                        <td>Forename:<br /><input name='forename' type='text' value='".$row_data['admin_forename']."'></td>
                        <td>County:<br /><input name='county' type='text' value='".$row_data['admin_county']."'></td>
                </tr>
                <tr>
                        <td>Surname:<br /><input name='surname' type='text' value='".$row_data['admin_surname']."'></td>
                        <td>Postcode:<br /><input name='postcode' type='text' value='".$row_data['admin_postcode']."'></td>
                </tr>
                <tr>
                        <td>E-Mail:<br /><input name='email' type='text' value='".$row_data['admin_email']."'></td>
                        <td>Phone:<br /><input name='phone' type='text' value='".$row_data['admin_phone']."'></td>
                </tr>
         </table>
         <p><input name='Save' type='submit' value='Save'><br /><br /><a href='index.php?mode=view'>Back</a></p>
         <input type='hidden' name='admin_id' value='".$row_data['admin_id']."'>
         </form>";
}

function updateAdminstrators(){
        global $connection;
        extract($_POST);
        if($_SESSION['level']=="Full"){
        $query="update admin set username ='".$username."', password = '".$password."', admin_forename = '".$forename."', admin_surname = '".$surname."', admin_addressone = '".$addressone."', admin_addresstwo = '".$addresstwo."', admin_city = '".$city."', admin_county = '".$county."', admin_postcode = '".$postcode."', admin_phone = '".$phone."', admin_email = '".$email."', admin_club = '".$club."', admin_level = '".$level."' where admin_id = '".$admin_id."'";
        $result=mysql_query($query,$connection);
        }
        if($_SESSION['level']=="Club"){
        $query="update admin set username ='".$username."', password = '".$password."', admin_forename = '".$forename."', admin_surname = '".$surname."', admin_addressone = '".$addressone."', admin_addresstwo = '".$addresstwo."', admin_city = '".$city."', admin_county = '".$county."', admin_postcode = '".$postcode."', admin_phone = '".$phone."', admin_email = '".$email."' where admin_id = '".$admin_id."'";
        $result=mysql_query($query,$connection);
        }
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
