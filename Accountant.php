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
<input type='radio' name='action' value='add' /><b>Add Invoice</b>
<input type='radio' name='action' value='list' /><b>Invoice list</b>

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
Invoice no<br/><br/><br/>
Patient Id<br/><br/><br/>
Staff Id<br/><br/><br/>
Amount<br/><br/><br/>
Status<br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='text' name='ino'/><br/><br/><br/>
<input type='text' name='pid'/><br/><br/><br/>
<input type='text' name='sid'/><br/><br/><br/>
<input type='text' name='amt'/><br/><br/><br/>
<input type='text' name='sts'/><br/><br/><br/>
</div>
</td>
<td>
<div id='margin'>
<input type='submit' value='Add' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}

$button=$_GET['button'];
$ino=$_GET['ino'];
$pid=$_GET['pid'];
$sid=$_GET['sid'];
$amt=$_GET['amt'];
$sts=$_GET['sts'];
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
$dinsert="insert into invoice values('$ino','$pid','$sid','$amt','$sts');";
if (mysql_query($dinsert, $con) )
{
print " Data Inserted" . "<br />\n";
}
else
{
print "Data Not Inserted : " .  "<br />\n" ;
}
}

if($act=='list')
{
$dsearch="select * from invoice;";
if ( $data=mysql_query($dsearch , $con) )
{
print "<table border='5' width='95%' align='center'>";
print "<tr>
<th>Invoice No</th>
<th>Patient Id</th>
<th>Staff Id</th>
<th>Amount</th>
<th>Status</th>
</tr>";
while( $rowdata=mysql_fetch_array($data) )
{
print "<tr >";
print "<td>";
print $rowdata['invoice_no'];
print "</td>";
print "<td>";
print $rowdata['patient_id'];
print "</td>";
print "<td>";
print $rowdata['staff_id'];
print "</td>";
print "<td>";
print $rowdata['amount'];
print "</td>";
print "<td>";
print $rowdata['status'];
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
