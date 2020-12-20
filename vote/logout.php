<?php
session_start();
?>
<html><head>
</head><body background="images/bck3.jpg">  
<center><b><font color = "black" size="6"> </font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Logged Out Successfully </h1>
<p align="center">&nbsp;</p>
</div>
<?php
session_destroy();
?>
You have been successfully logged out.<br><br><br>
Return to <a href="index.php">Login</a>
<div id="footer">
</div>
</div>
</body></html>