<?php
print "
<html>
<head>	
<link rel='stylesheet' type='text/css' href='style1.css' />
</head>
<body id='margin'>
<img src='logo1.jpeg' width='150' height='100' />
<h1 id='st'>LIFE-LINE HOSPITAL</h1> 
<br/><br/><br/>
<fieldset id='frm'>
<form >
<input type='radio' name='action' value='list' /><b>Show Patient list</b>
<input type='radio' name='action' value='add' /><b>Add a Patient</b>
<input type='radio' name='action' value='remove' /><b>Remove a Patient</b>
<br/><br/>
<input type='submit' value='apply'/><br/>
</form>

</fieldset>
<br/><br/><br/><br/>
</body>
</html>
";
$act=$_GET['action'];
if ($act == 'add')
{
print " 
<fieldset id='margin'><form><table id='margin'><tr><td><br/>
Patient Id<br/><br/><br/>
Patient Name<br/><br/><br/>
Patient password<br/><br/><br/>
Gender<br/><br/><br/>
Blood group<br/><br/><br/>
Contact Address<br/><br/><br/>
Contact no<br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='text' name='pid'/><br/><br/><br/>
<input type='text' name='pname'/><br/><br/><br/>
<input type='text' name='ppwd'/><br/><br/><br/>
<input type='text' name='pgen'/><br/><br/><br/>
<input type='text' name='pbgrp'/><br/><br/><br/>
<input type='text' name='pcadd'/><br/><br/><br/>
<input type='text' name='pcno'/><br/><br/><br/>
</div>
</td>
<td>
<div id='margin'>
<input type='submit' value='Add' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}
if ($act == 'remove')
{
print " 
<fieldset id='margin'><form><table id='margin'><tr><td>
Enter Patient Id<br/><br/><br/>
<input type='text' name='pid'/><br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='submit' value='Remove' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}

$button=$_GET['button'];
$pid=$_GET['pid'];
$pname=$_GET['pname'];
$ppwd=$_GET['ppwd'];
$pgen=$_GET['pgen'];
$pbgrp=$_GET['pbgrp'];
$pcadd=$_GET['pcadd'];
$pcno=$_GET['pcno'];
$dbname="lifeline";

if ($con=mysql_connect("localhost","root","lw") )
{
//print "DB Connected" . "<br />\n";
}
else
{
print "DB not connected" . mysql_error() .  "<br />\n";
die();
}
if (mysql_select_db($dbname , $con) )
{
//print "DB Used" . "<br />\n";
}
else
{
print "DB not Used : " . mysql_error() . "<br />\n" ;
}

if($button=='Add')
{
$dinsert="insert into patient values('$pid','$pname','$ppwd','$pgen','$pbgrp','$pcadd','$pcno');";
if (mysql_query($dinsert, $con) )
{
print " Data Inserted" . "<br />\n";
}
else
{
print "Data Not Inserted : " .  "<br />\n" ;
}
}



if($button=='Remove')
{
$dremove="delete from patient where patient_id= '$pid'";
if (mysql_query($dremove, $con) )
{
print " Data removed" . "<br />\n";
}
else
{
print "Data Not exists: " .  "<br />\n" ;
}
}

if($act=='list')
{
$dsearch="select * from patient;";
if ( $data=mysql_query($dsearch , $con) )
{
print "<table border='5' width='95%' align='center'>";
print "<tr>
<th>Patient Id</th>
<th>Patient Name</th>
<th>Patient Password</th>
<th>Gender</th>
<th>Blood group</th>
<th>Contact Address</th>
<th>Contact number</th>
</tr>";
while( $rowdata=mysql_fetch_array($data) )
{
print "<tr >";
print "<td>";
print $rowdata['patient_id'];
print "</td>";
print "<td>";
print $rowdata['patient_name'];
print "</td>";
print "<td>";
print $rowdata['patient_pwd'];
print "</td>";
print "<td>";
print $rowdata['gender'];
print "</td>";
print "<td>";
print $rowdata['blood_grp'];
print "</td>";
print "<td>";
print $rowdata['contact_address'];
print "</td>";
print "<td>";
print $rowdata['contact_no'];
print "</td>";
print "</tr>";
}
print "</table>";
//print "DB Searched" . "<br />\n";
}
else
{
print "DB not Search : " . mysql_error() . "<br />\n" ;
}
}

if ( mysql_close($con) )
{
//print "DB closed" . "<br />\n";
}
else
{
print "DB not Closed : " . mysql_error() . "<br />\n" ;
}
?>

