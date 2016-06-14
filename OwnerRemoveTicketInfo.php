<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$user =$_POST["driver"];
$start = $_POST["startdate"];
$end = $_POST["enddate"];
$hauler =$_POST["hauler"];
$broker =$_POST["broker"];
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

if ($hauler == "*")
{
	 $cvendor = "";
}
else
{
	 $cvendor = "and HaulerName='$hauler'";
}

if ($broker == "*")
{
	 $cexpensetype = "";
}
else
{
	 $cexpensetype = "and BrokerName='$broker'";
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
$sql = "SELECT * FROM Ticket Where TicketDate Between '$start' and '$end' $cvendor $cexpense $ctruckid $cexpensetype $cuser ORDER BY TicketDate DESC";
$result = $conn->query($sql);

echo "From: $start to $end";
echo "<table id='t01' class='center'/>"; // start a table tag in the HTML
echo "<tr> <th>Delete</th><th>TicketID</th> <th>Date</th> <th>Truck</th> <th>Driver</th> <th>Hauler</th> <th>Broker</th> <th>Rate</th> <th>Tons/Hours</th> <th>Total</th>   </tr> ";

while($row = $result->fetch_assoc())
{
		$Approval = "Approved";
		if ($row['Approval'] == 0 )
		{
				$Approval="Not Approved";

		}
		echo "<tr><td>" ." <input type='checkbox' name='check_list[]' value='".$row['TicketID']."'</td><td>"  . $row['TicketID'] . "</td><td>" . $row['TicketDate']  . "</td><td>" . $row['TruckID'] . "</td><td>". $row['DriverName']. "</td><td>" . $row['HaulerName'] . "</td><td>" . $row['BrokerName'] . "</td><td>" ."$" .$row['Rate'] . "</td><td>" . $row['Amount'] . "</td><td>" ." $". round($row['Total'],2)  ."</tr></td>";
		

}

$conn->close();
echo "</table>"; //Close the table

?>
