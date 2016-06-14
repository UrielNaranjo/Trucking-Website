<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$user =$_COOKIE[uname];
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
$sql = "SELECT * FROM Expense Where ExpenseDate Between '$start' and '$end' $cvendor $cexpense $ctruckid $cexpensetype $cuser and Approve=0 ORDER BY ExpenseDate DESC";
//echo $sql;
$result = $conn->query($sql);


echo "From: $start to $end";
echo "<table id='t01' class='center'/>"; // start a table tag in the HTML
echo "<tr> <th>Delete</th> <th>Driver</th> <th>Date</th> <th>TruckID</th> <th>Vendor</th> <th>Type</th> <th>Description</th> <th>Total</th>  </tr> ";

while($row = $result->fetch_assoc())
{
		echo "<tr><td>" ." <input type='checkbox' name='check_list[]' value='".$row['ExpenseID']."'</td><td>". $row['DriverName'] . "</td><td>" . $row['ExpenseDate']  . "</td><td>" . $row['TruckID'] . "</td><td>" . $row['VendorName'] . "</td><td>" . $row['ExpenseType'] . "</td><td>" . $row['Details'] . "</td><td>" ." $". round($row['Amount'],2) . "</td></tr>";
		//$row['index'] the index here is a field name

}

$conn->close();
echo "</table>"; //Close the table

?>
