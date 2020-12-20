<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
</head>
<body background="images/img2.jpg">
<center><b><font color = "black" size="9"> </font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Logged Out Successfully </h1>
<p align="center">&nbsp;</p>
</div>
<?
session_start();
session_destroy();
?>
<font size=6>You have been successfully logged out of your control panel.<br><br><br>
Return to <a href="index.php">Login</a></font>
<div id="footer">
</div>
</div>
</body></html>