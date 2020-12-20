<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Access Denied</title>
</head>
<body background="images/back3.jpg">  
<center><b><font color = "black" size="6"> </b></center><br><br>
<body>
<div id="page">
<div id="header">
<h1>Invalid Details Provided </h1>
<p align="center">&nbsp;</p>
</div>
<div id="container">
<?php
ini_set ("display_errors", "1");
error_reporting(E_ALL);

ob_start();
session_start();

require('connection.php');


// Defining your login details
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$_SESSION['uname']=$myusername;

$encrypted_mypassword=md5($mypassword);
// MySQL injection protections
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);







$sql1="SELECT check1 FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'";
$res=mysql_query($sql1) or die(mysql_error());
while($row=mysql_fetch_assoc($res))
{
	$xyz=$row['check1'];
}
if($xyz!=1){







$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysql_error());
$result=mysql_query($sql) or die(mysql_error());

$count=mysql_num_rows($result);


if($count==1){
$user = mysql_fetch_assoc($result);
$_SESSION['member_id'] = $user['member_id'];
header("location:student.php");
}



else {
echo "Wrong Username or Password<br><br>Return to <a href=\"index.php\">login</a>";
}
}




else{

echo"<script type='text/javascript'>alert('you have done with your voting');</script>";
echo"<script type='text/javascript'>location.href='index.php';</script>";

}





ob_end_flush();

?> 
</div>
<div id="footer"> 
</div>
</div>
</body>
</html>
