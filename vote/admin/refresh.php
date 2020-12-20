<?php
require('../connection.php');
$link=mysqli_connect('localhost', 'root', '','poll');

?> 
<?php

$positions=mysqli_query($link,"SELECT * FROM tbpositions")
 
?>
<?php
session_start();

if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>



<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body background="images/img1.jpg">
<center><b><font color = "brown" size="6"></font></b></center><br><br>
<div id="page">
<div id="header">
<h1>POLL RESULTS </h1>
<a href="admin.php"><font size=5>HOME</a></font> | <a href="manage-admins.php"><font size=5>MANAGE ADMINISTRATOR</a></font> | <a href="positions.php"><font size=5>MANAGE POSITIONS</a></font> | <a href="candidates.php"><font size=5>MANAGE CANDIDATES</a></font> | <a href="refresh.php"><font size=5>POLL RESULTS</a></font> | <a href="logout.php"><font size=5>LOGOUT</a></font>
</div>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
    <OPTION VALUE="select">select
    <?php 
    

    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=".$row[position_name].">$row[position_name]"; 
    
    }

    ?>
    </SELECT></td>
    <td><input type="submit" value="See Results" name="set"/></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>

<?php
if(isset($_POST['set']))
{
$pos=$_POST['position'];
}
echo "<center><h2>".$pos."</h2></center>";

$query="CALL disp ('$pos')";
$res=mysqli_query($link,$query);
while($row=mysqli_fetch_assoc($res))
{
echo "<center>".$row["candidate_name"]."</center>"."<center>".$row["candidate_cvotes"]."</center></br>";
}


if(isset($positions))
{
echo "<br>";
echo $positions;
$q1="select candidate_name,candidate_cvotes from tbcandidates where candidate_position=$positions";
$res=mysqli_query($q1);
while($row=mysqli_fetch_assoc($res))
{
echo $row["candidate_name"]."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row["candidate_cvotes"]."<br>";
}
}
else
{
echo "no";
}

$pos=$_POST['position'];

	echo "total votes";

$result=$link->query($sql);
?>

<br>
<br>

<br>
</div>
<div id="footer">

</div>
</div>
</body></html>
