<?php

function main(){
global $connection, $AdminID;

echo"
        <h2>User Agreement</h2>
        <p>The following user agreement was created on 23rd March 2007.<br /><br />
        The agreement is split into three sections: -<br /><br />
        <b>User Responsibilities</b><br />
        <b>Privacy Policy</b><br />
        <b>Other Terms and Conditions</b><br /><br />
        By using this web application the administrator automatically agrees to these rules and regulations. If you do not agree and would like to have your account removed from the system please click <a href='javascript:deleteaccount(\"index.php?mode=deleteaccount&id=$AdminID\")'>here</a>. By doing this all information regarding your account as well any personal information or data you have submitted will be deleted instantly and become un-recoverable.</p>
        <h3>User Responsibilities</h3>
        <p><b>No Multiple Accounts.</b> Should a user request more then one administrator account the Hants and Dorset reserves the right to terminate all of your accounts and will restrict you from the system going forward. Users may register and hold one administrator account and must specify which rowing club they are the secretary of. This information will be checked by the Hants and Dorset secretary against the latest information. To view the current rowing club secretaries please refer to the H&DARA web site.<br /><br />
        <b>Registration Information.</b> You agree to provide true, accurate and complete registration information and to maintain and promptly update your information as applicable. You agree not to impersonate any other person or use a name that you are not authorized to use. If any information you provide is untrue, inaccurate, not current, or incomplete, without limiting other remedies, the Hants and Dorset reserves the right to terminate your account.<br /><br />
        <b>Crew Registrations.</b> All information entered into the system involving crew registrations will be public knowledge and viewable by all users of the web application. However only names of competitors are collected by the system, if an error is made in the crew registration the rowing club administrator should be contacted directly using the supplied e-mail address.<br /><br />
        <b>Correct E-mail.</b> You agree and warrant that you have access to the internet and to a current functional personal e-mail address. Although we will take reasonable steps to contact you based on information that you have provided us, the H&DARA will not be liable for any undelivered e-mail communications or any costs you incur for maintaining internet access and an e-mail account.<br /><br />
        <b>No Spam.</b> You agree not to use email addresses of H&DARA users to send unsolicited email. You agree not to use unsolicited email, usenet, message board postings, or similar methods of mass messaging (spam) to gather referral bonuses. The use of spam to promote the Service has strict negative consequences. We will immediately and permanently terminate the account of any user who has sent unsolicited email targeting H&DARA users to gain referrals or for any other purpose.<br /><br />
        <b>Passwords.</b> You may not reveal your account password(s) to anyone else, nor may you use anyone else's password. The H&DARA is not responsible for losses incurred by users as the result of their misuse of passwords.<br /><br />
        <b>Closing Your Account.</b> You may close your account at any time by either contacting the H&DARA administrator or simply clicking here. By doing this all information regarding your account as well any personal information or data you have submitted will be deleted instantly and become un-recoverable.<br /><br />
        <b>Hacking.</b> If you use, or attempt to use the service for purposes other than sending and receiving regatta information and managing your account, including but not limited to tampering, hacking, modifying or otherwise corrupting the security or functionality of service, your account will be terminated immediately without warning.</p>
        <h3>Privacy Policy</h3>
        <p><b>Information Collected.</b> The only information collected by the system will be the administrators name and contact details. These details once entered into the system will be accessible by all users, however can only be changed or removed by the specific administrator or members of the Hants and Dorset committee.</p>
        <h3>Other Terms and Conditions</h3>
        <p><b>Current None Applicable</b></p>
        <br /><br />";
}

function deleteaccount(){
global $connection, $AdminID;
        global $connection;
        $ID = $_GET['id'];
        $query = "delete from admin where admin_id = ".$ID;
        $result = @mysql_query($query, $connection)
                or die ("Unable to perform query<br />$query");
        header('Location: ./index.php');
}

?>
