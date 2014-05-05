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
<input type='radio' name='action' value='list' /><b>Show Department list</b>
<input type='radio' name='action' value='add' /><b>Add a Department</b>
<input type='radio' name='action' value='remove' /><b>Remove a Department</b>
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
Department Id<br/><br/><br/>
Department Name<br/><br/><br/>
Description<br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='text' name='deptid'/><br/><br/><br/>
<input type='text' name='deptname'/><br/><br/><br/>
<input type='text' name='des'/><br/><br/><br/>
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
Enter Dept Id<br/><br/><br/>
<input type='text' name='deptid'/><br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='submit' value='Remove' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}
$button=$_GET['button'];
$deptid=$_GET['deptid'];
$deptname=$_GET['deptname'];
$des=$_GET['des'];
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
$dinsert="insert into dept values('$deptid','$deptname','$des');";
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
$dremove="delete from dept where dept_id= $deptid";
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
$dsearch="select * from dept;";
if ( $data=mysql_query($dsearch , $con) )
{
print "<table border='5' width='95%' align='center'>";
print "<tr>
<th>Dept id</th>
<th>Dept Name</th>
<th>Dept description</th>
</tr>";
while( $rowdata=mysql_fetch_array($data) )
{
print "<tr >";
print "<td>";
print $rowdata['dept_id'];
print "</td>";
print "<td>";
print $rowdata['dept_name'];
print "</td>";
print "<td>";
print $rowdata['dept_desc'];
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
