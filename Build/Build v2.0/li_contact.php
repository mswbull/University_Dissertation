<?php
        session_start();
        if (isset($_SESSION['username'])==false){
                header("Location:login.php");
                exit();
        }
// get posted data into local variables
$EmailFrom = "mswbull@gmail.com";
$EmailTo = "mswbull@gmail.com";
$Subject = "Dorney SCC - Contact Us";
$Name = Trim(stripslashes($_POST['Name']));
$Email = Trim(stripslashes($_POST['Email']));
$Question = Trim(stripslashes($_POST['Question']));

$requiredArr = explode(',',$_POST['required']);
foreach ($requiredArr as $field) {
        if($_POST[$field] == ""){
     $valid = $valid."Error Missing Field ".$field."<br />";
    }
}
// validation
$validationOK=true;

if ($valid=="") {
// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Question: ";
$Body .= $Question;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=li_index.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=li_contactus.php\">";
}
}else{
print "<meta http-equiv=\"refresh\" content=\"0;URL=li_contactus.php\">";
  exit;
}


?>
