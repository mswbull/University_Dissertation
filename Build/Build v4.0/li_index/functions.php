<?php

function admincontent(){
        global $connection, $forename;

                if($_SESSION['level']=="Full"){
                        echo"
                        <h2>Welcome $forename</h2>
                        <img src='../images/dorney2.jpg' border='0'>
                        <h3>Please select an option from the navigation bar above.</h3>
                        <p>The headers below explain what options are available for each section of the navigation bar.<br /><br />
                        <b>Home</b><br />This Page - (To return to this page at any time just click the home button).<br /><br />
                        <b>Register Clubs</b><br />Allows you to enter new rowing clubs for the south coast championship regatta. This section also allows you to view, edit and delete rowing clubs that have already entered. This process must be completed before a rowing club administrator can be assigned or any crews can be entered.<br /><br />
                        <b>Register Crews</b><br />Allows you to enter new crews for any registered rowing club. This section also allows you to view, edit and delete crews that have already entered.<br /><br />
                        <b>Programme</b><br />Displays which crews are entered for which events and allows for the south coast championship programme to be created or modified.<br /><br />
                        <b>Results</b><br />Allows you to enter results of the races as well view, edit and delete the results.<br /><br />
                        <b>Administrator Accounts</b><br />Displays information and control options for the administrator accounts you have access to.<br /><br /></p>";
                }
                if($_SESSION['level']=="Club"){
                        echo"
                        <h2>Welcome $forename</h2>
                        <img src='../images/dorney2.jpg' border='0'>
                        <h3>Please select an option from the navigation bar above.</h3>
                        <p>The headers below explain what options are available for each section of the navigation bar.<br /><br />
                        <b>Home</b><br />This Page - (To return to this page at any time just click the home button).<br /><br />
                        <b>Register Crews</b><br />Allows you to enter new crews for the south coast championship regatta. This section also allows you to view, edit and delete crews that your rowing club have already entered.<br /><br />
                        <b>Administrator Account</b><br />Displays information and control options for your rowing club administrator account.<br /><br /></p>";
                }
}

?>
