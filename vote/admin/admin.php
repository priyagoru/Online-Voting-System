<?php
session_start();
require('../connection.php');

if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head><body background="images/img2.jpg">    
<center><b><font color = "black" size="7"> </font></b></center><br><br>
<div id="page">
<div id="header">
<h1><font color="red">ADMINISTRATION CONTROL PANEL </h1>
<a href="admin.php"><font size=5>HOME</a></font> | <a href="manage-admins.php"><font size=5>MANAGE ADMINISTRATOR</a></font> | <a href="positions.php"><font size=5>MANAGE POSITIONS</a></font> | <a href="candidates.php"><font size=5>MANAGE CANDIDATES</a></font> | <a href="refresh.php"><font size=5>POLL RESULTS</a></font> | <a href="logout.php"><font size=5>LOGOUT</a></font>
</div>
<p align="center">&nbsp;</p>
<div id="container">

<p><font size=5 color=black>Click a link above to perform an administrative operation.</p></font>


</div>
<div id="footer">
</div>
</div>
</body></html>