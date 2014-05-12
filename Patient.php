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
<input type='radio' name='action' value='vpres' /><b>View Prescription</b>
<input type='radio' name='action' value='vinc' /><b>View Invoice</b>
<br/><br/>
<input type='submit' value='apply'/><br/>
</form>

</fieldset>
<br/><br/><br/><br/>
</body>
</html>
";
$act=$_GET['action'];


if ($act == 'vpres')
{
print " 
<fieldset id='margin'><form><table id='margin'><tr><td>
Enter Patient Id<br/><br/><br/>
<input type='text' name='pid'/><br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='submit' value='Showpres' name='button'/>
</div></td></tr></table></form></fieldset> 
";
}

if ($act == 'vinc')
{
print " 
<fieldset id='margin'><form><table id='margin'><tr><td>
Enter Patient Id<br/><br/><br/>
<input type='text' name='pid'/><br/><br/><br/>
</td>
<td>
<div id='margin'>
<input type='submit' value='Showinc' name='button'/>
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



if($button=='Showpres')
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

if($button=='Showinc')
{
$dsearch="select * from invoice;";
if ( $data=mysql_query($dsearch , $con) )
{
print "<table border='5' width='95%' align='center'>";
print "<tr>
<th>Invoice No</th>
<th>Patient Id</th>
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
