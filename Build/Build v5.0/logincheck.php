<?php
        session_start();
        require"connect.php";
        $username=$_GET['username'];
        $password=$_GET['password'];

        $query="select * from admin where username ='".$username.
                "'and password ='".$password."'";

        $result=@mysql_query($query, $connection)
                or die("Unable to perform query<br />$query");

        $row=mysql_fetch_array($result);
        if($row !=null){
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['AdminID'] = $row['admin_id'];
                        $_SESSION['forename'] = $row['admin_forename'];
                        $_SESSION['surname'] = $row['admin_surname'];
                        $_SESSION['level'] = $row['admin_level'];
                        $_SESSION['AdminClub'] = $row['admin_club'];
                        $_SESSION['email'] = $row['admin_email'];
                        header("Location: ./li_index/index.php");
                        exit();
                }
                else{
                        header("Location: login.php");
                        exit();
        }
?>
