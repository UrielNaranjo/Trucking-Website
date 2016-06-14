<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$user =$_POST["driver"];
$start = $_POST["startdate"];
$end = $_POST["enddate"];
$vendor =$_POST["vendor"];
$expensetype =$_POST["type"];
$truckid = $_POST["truckid"];
$currentdate = date("y-m-d");
$currentyear = explode('-', $currentdate)[0];

if(strlen($start) == 0)
{
	$start = $currentyear."-01-01";
}

if(strlen($end) == 0)
{
	$end = date("y-m-d");
}

if(strlen($end) == 0)
{
	$end = date("y-m-d");
}

if ($user == "*")
{
	 $cuser = "";
}
else
{
	 $cuser = "and DriverName='$user'";
}

if ($vendor == "*")
{
	 $cvendor = "";
}
else
{
	 $cvendor = "and VendorName='$vendor'";
}

if ($expensetype == "*")
{
	 $cexpensetype = "";
}
else
{
	 $cexpensetype = "and ExpenseType='$expensetype'";
}

if ($truckid == "*")
{
	$ctruckid = "";
}
else
{
	$ctruckid = "and TruckID='$truckid'";
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//Run Query to authenticate User
$sql = "SELECT * FROM Expense Where ExpenseDate Between '$start' and '$end' $cvendor $cexpense $ctruckid $cexpensetype $cuser ORDER BY ExpenseDate DESC";
//echo $sql;
$result = $conn->query($sql);
$sum = "SELECT SUM(Amount) FROM Expense Where ExpenseDate Between '$start' and '$end' $cvendor $cexpense $ctruckid $cexpensetype $cuser";
$sumresult = $conn->query($sum);
$rowsum = $sumresult->fetch_assoc();
$rate = "SELECT PayRate From Driver Where DriverName='$user'";
$rateresult = $conn->query($rate);
$rowresult = $rateresult->fetch_assoc();
$PayRate = $rowresult[PayRate];

$DriverTotal = ($PayRate * $rowsum['SUM(Total)'])/100;

echo "From: $start to $end";
echo "<table id='t01' class='center'>"; // start a table tag in the HTML
echo "<tr> <th>Driver</th> <th>Date</th> <th>TruckID</th> <th>Vendor</th> <th>Type</th> <th>Description</th> <th>Total</th>  </tr> ";

while($row = $result->fetch_assoc())
{
		echo "<tr><td>" . $row['DriverName'] . "</td><td>" . $row['ExpenseDate']  . "</td><td>" . $row['TruckID'] . "</td><td>" . $row['VendorName'] . "</td><td>" . $row['ExpenseType'] . "</td><td>" . $row['Details'] . "</td><td>" ." $". round($row['Amount'],2) . "</td></tr>";
		//$row['index'] the index here is a field name

}

echo "<tr> <td colspan='9' style='text-align:center' > Expense Total: $".round($rowsum['SUM(Amount)'],2)." </td> </tr> ";
$conn->close();
echo "</table>"; //Close the table

?>
