<?php
require('connection.php');

session_start();
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
</head><body background="images/bck3.jpg">

<center><b><font color = "black" size="6"> </font></b></center><br><br>
<div id="page">
<div id="header">
<h1>STUDENT HOME </h1>
<a href="student.php">Home</a> | <a href="vote.php">Current Polls</a> | <a href="manage-profile.php">Manage My Profile</a> | <a href="logout.php">Logout</a>
</div>
<div id="container">
<p><font color="black" size="10">Click a link above to do some stuff.</p>
</div>
<div id="footer">
</div>
</div>
</body></html>