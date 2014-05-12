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
<form id='topright' action='login.php'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' value='logout'/>
</form>

<fieldset id='margin'>
<form >
<input type='radio' name='action' value='add' /><b>Add a Prescription</b>
<input type='radio' name='action' value='chis' /><b>Show Case History</b>
<input type='radio' name='action' value='list' /><b>Show Prescription list</b>
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
Prescription No<br/><br/><br/>
Staff Id<br/><br/><br/>
Patient Id<br/><br/><br/>
Medication<br/><br/><br/>
</td>
<td>
<div id='margin'>
<br/><br/><br/><br/><br/><br/>
<input type='text' name='pno'/><br/><br/><br/>
<input type='text' name='sid'/><br/><br/><br/>
<input type='text' name='pid'/><br/><br/><br/>
<textarea rows='10' cols='30' name='med'></textarea>
</div>
</td>
<td>
<div id='margin'>
<input type='submit' value='Add' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}

if ($act == 'chis')
{
print " 
<fieldset id='margin'><form><table id='margin'><tr><td>
Enter Patient id<br/><br/><br/>
<input type='text' name='pid'/><br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='submit' value='Show Case history' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}

if ($act == 'list')
{
print " 
<fieldset id='margin'><form><table id='margin'><tr><td>
Enter Staff id<br/><br/><br/>
<input type='text' name='sid'/><br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='submit' value='Show' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}

$button=$_GET['button'];
$pno=$_GET['pno'];
$sid=$_GET['sid'];
$pid=$_GET['pid'];
$med=$_GET['med'];
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
$dinsert="insert into prescription values('$pno','$sid','$pid','$med');";
if (mysql_query($dinsert, $con) )
{
print " Data Inserted" . "<br />\n";
}
else
{
print "Data Not Inserted : " .  "<br />\n" ;
}
}

if($button=='Show Case history')
{
$dsearch="select * from prescription where patient_id='$pid';";
if ( $data=mysql_query($dsearch , $con) )
{
print "<table border='5' width='95%' align='center'>";
print "<tr>
<th>Prescription No</th>
<th>Staff Id</th>
<th>Patient Id</th>
<th>Medication</th>
</tr>";
while( $rowdata=mysql_fetch_array($data) )
{
print "<tr >";
print "<td>";
print $rowdata['pres_no'];
print "</td>";
print "<td>";
print $rowdata['staff_id'];
print "</td>";
print "<td>";
print $rowdata['patient_id'];
print "</td>";
print "<td>";
print $rowdata['medication'];
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

if($button=='Show')
{
$dsearch="select * from prescription where staff_id='$sid';";
if ( $data=mysql_query($dsearch , $con) )
{
print "<table border='5' width='95%' align='center'>";
print "<tr>
<th>Prescription No</th>
<th>Staff Id</th>
<th>Patient Id</th>
<th>Medication</th>
</tr>";
while( $rowdata=mysql_fetch_array($data) )
{
print "<tr >";
print "<td>";
print $rowdata['pres_no'];
print "</td>";
print "<td>";
print $rowdata['staff_id'];
print "</td>";
print "<td>";
print $rowdata['patient_id'];
print "</td>";
print "<td>";
print $rowdata['medication'];
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
