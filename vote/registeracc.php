<html>
<head>
<script language="JavaScript" src="js/user.js">
</script>
</head><body background="images/bck3.jpg">
   
<center><b><font color = "black" size="9"> </font></b></center><br><br>
<div id="page">
<div id="header">
<td>&nbsp;</td>
<h1><font size=9 color=black>Student Registration</font> </h1>
<td>&nbsp;</td>
<div class="news"><marquee behavior="alternate"><font color="black" size="5"> Hello new USER...!! </marquee></div>
</div>
<div id="container">
<?php
require('connection.php');
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] );
$myLastName = addslashes( $_POST['lastname'] ); 
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); 
$sql = mysql_query( "INSERT INTO tbMembers(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" )
        or die( mysql_error() );

die( "You have registered for an account.<br><br>Go to <a href=\"index.php\">Login</a>" );
}

echo "<center><h3><font size=6>Register an account by filling in the needed information below:</h3></center><br><br>";
echo '<form action="registeracc.php" method="post" onsubmit="return registerValidate(this)">';
echo '<table align="center"><tr><td>';
echo "<tr><td><font size=5 color=black>First Name:</td></font><td><input type='text' style='background-color:#999999; font-weight:bold;' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td><font size=5 color=black>Last Name:</td></font><td><input type='text' style='background-color:#999999; font-weight:bold;' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td><font size=5 color=black>Email Address:</td></font><td><input type='text' style='background-color:#999999; font-weight:bold;' name='email' maxlength='100' value=''></td></tr>";
echo "<tr><td><font size=5 color=black>Password:</td></font><td><input type='password' style='background-color:#999999; font-weight:bold;' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td><font size=5 color=black>Confirm Password:</td></font><td><input type='password' style='background-color:#999999; font-weight:bold;' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Register Account'/></td></tr>";
echo "<tr><td colspan = '2'><p><font size=5 color=#191970>Already have an account?</font> <a href='index.php'><b><font size=5>Login Here</font></b></a></td></tr>";
echo "</tr></td></table>";
echo "</form>";
?>
</div> 
<div id="footer">
</div>
</div>
</body></html>