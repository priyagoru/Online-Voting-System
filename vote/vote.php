<?php
require('connection.php');

session_start();


if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<?php

$positions=mysql_query("SELECT * FROM tbpositions")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<?php
   
// check if Submit is set in POST
 if (isset($_POST['Submit']))
 {
 // get position value
 $position = addslashes( $_POST['position'] ); 
 
 // retrieve based on position
 $result = mysql_query("SELECT * FROM tbCandidates WHERE candidate_position='$position'")
 or die(" There are no records at the moment ... \n"); 
 
 // redirect back to vote
 //header("Location: vote.php");
 }
else
 // do something
  
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Voting Page</title>  
<script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
	xmlhttp.open("GET","save.php?vote="+int,true);
	xmlhttp.send();
	}
	else
	{
	alert("Choose another candidate ");	
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
</head>
<body background="images/bck3.jpg">
<center>
<b><font color = "black" size="8"> </font></b></center><br><br>
<body>
<div id="page">
<div id="header">
  <h1>CURRENT POLLS</h1>
  <a href="student.php"><font size=5 >Home</a></font> | <a href="vote.php"><font size=5 >Current Polls</a></font> | <a href="manage-profile.php"><font size=5 >Manage My Profile</a></font> | <a href="logout.php"><font size=5 >Logout</a></font>
</div>
<div class="refresh">
</div>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysql_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Candidates" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<table width="270" align="center">
<form>
<tr>
    <th>Candidates:</th>
</tr>
<?php
//loop through all table rows
//if (mysql_num_rows($result)>0){
  if (isset($_POST['Submit']))
  {
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
//}
  }
else
// do nothing
?>
<tr>
    <h3>NB: Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote.</h3>
    <td>&nbsp;</td>
</tr>
</form>
</table>
</div>


<?php
$uname=$_SESSION['uname'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poll";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$x=1;
$sql = "UPDATE tbmembers SET check1='$x' WHERE email='$uname'";

if ($conn->query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: not inserted".$conn->error;
}

$conn->close();

?>



<div id="footer"> 
</div>
</div>
</body>
</html>