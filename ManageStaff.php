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
<input type='radio' name='action' value='list' /><b>Show staff list</b>
<input type='radio' name='action' value='add' /><b>Add a staff member</b>
<input type='radio' name='action' value='remove' /><b>Remove a staff member</b>
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
<fieldset id='margin'><form><table id='margin'><tr><td>
Staff Id<br/><br/><br/>
Staff Name<br/><br/><br/>
Staff password<br/><br/><br/>
Contact number<br/><br/><br/>
Gender<br/><br/><br/>
Dept id<br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='text' name='sid'/><br/><br/><br/>
<input type='text' name='sname'/><br/><br/><br/>
<input type='text' name='spwd'/><br/><br/><br/>
<input type='text' name='cno'/><br/><br/><br/>
<input type='text' name='gen'/><br/><br/><br/>
<input type='text' name='did'/><br/><br/><br/>
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
Enter Staff Id<br/><br/><br/>
<input type='text' name='sid'/><br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='submit' value='Remove' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}

$button=$_GET['button'];
$sid=$_GET['sid'];
$sname=$_GET['sname'];
$spwd=$_GET['spwd'];
$cno=$_GET['cno'];
$gen=$_GET['gen'];
$did=$_GET['did'];

$dbname="lifeline";
$tname="staff";
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
$dinsert="insert into staff values('$sid','$sname','$spwd','$cno','$gen','$did');";
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
$dremove="delete from staff where staff_id= '$sid'";
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
$dsearch="select * from staff;";
if ( $data=mysql_query($dsearch , $con) )
{
print "<table border='5' width='95%' align='center'>";
print "<tr>
<th>Staff Id</th>
<th>Staff Name</th>
<th>Staff Password</th>
<th>Contact number</th>
<th>Gender</th>
<th>Dept id</th>
</tr>";
while( $rowdata=mysql_fetch_array($data) )
{
print "<tr >";
print "<td>";
print $rowdata['staff_id'];
print "</td>";
print "<td>";
print $rowdata['staff_name'];
print "</td>";
print "<td>";
print $rowdata['staff_pwd'];
print "</td>";
print "<td>";
print $rowdata['contact_no'];
print "</td>";
print "<td>";
print $rowdata['gender'];
print "</td>";
print "<td>";
print $rowdata['dept_id'];
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
