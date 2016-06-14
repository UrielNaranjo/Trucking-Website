<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$user =$_POST["driver"];
$start = $_POST["startdate"];
$end = $_POST["enddate"];
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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//Run Query to authenticate User
$sql = "SELECT * FROM Ticket Where TicketDate Between '$start' and '$end' and DriverName ='$user'  ORDER BY TicketDate DESC";
$result = $conn->query($sql);
$sum = "SELECT SUM(Total) FROM Ticket Where TicketDate Between '$start' and '$end' and DriverName ='$user'";
$sumresult = $conn->query($sum);
$rowsum = $sumresult->fetch_assoc();
$rate = "SELECT PayRate From Driver Where DriverName='$user'";
$rateresult = $conn->query($rate);
$rowresult = $rateresult->fetch_assoc();
$PayRate = $rowresult[PayRate];

$DriverTotal = ($PayRate * $rowsum['SUM(Total)'])/100;

echo "From: $start to $end for $user ";
echo "<table id='t01' class='center'>"; // start a table tag in the HTML
echo "<tr> <th>TicketID</th> <th>Date</th> <th>TruckID</th> <th>Hauler</th> <th>Broker</th> <th>Rate</th> <th>Tons/Hours</th> <th>Total</th> <th>Approval</th>  </tr> ";

while($row = $result->fetch_assoc())
{
		$Approval = "Approved";
		if ($row['Approval'] == 0 )
		{
				$Approval="Not Approved";

		}
		echo "<tr><td>" . $row['TicketID'] . "</td><td>" . $row['TicketDate']  . "</td><td>" . $row['TruckID'] . "</td><td>" . $row['HaulerName'] . "</td><td>" . $row['BrokerName'] . "</td><td>" ."$" .round($row['Rate'],2) . "</td><td>" .round($row['Amount'],2) . "</td><td>" ." $". round($row['Total'],2) . "</td><td>". "$Approval" ."</td></tr>";
		//$row['index'] the index here is a field name

}

echo "<tr> <td colspan='9' style='text-align:center' > Truck Total: $". round($rowsum['SUM(Total)'],2)." </td> </tr> ";
echo "<tr> <td colspan='9' style='text-align:center' > DriverTotal: $". round($DriverTotal,2)." @ ".$PayRate."% </td> </tr> ";
$conn->close();
echo "</table>"; //Close the table

?>
