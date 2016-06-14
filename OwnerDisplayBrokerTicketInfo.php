<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$user = $_POST["broker"];
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
$sql = "SELECT * FROM Ticket Where TicketDate Between '$start' and '$end' and BrokerName ='$user'  ORDER BY TicketDate DESC";
$result = $conn->query($sql);
$sum = "SELECT SUM(Total) FROM Ticket Where TicketDate Between '$start' and '$end' and BrokerName ='$user' and Paid ='0'";
$sumresult = $conn->query($sum);
$rowsum = $sumresult->fetch_assoc();
//Get Raw Total
$sum1 = "SELECT SUM(Total) FROM Ticket Where TicketDate Between '$start' and '$end' and BrokerName ='$user'";
$sumresult1 = $conn->query($sum1);
$rowsum1 = $sumresult1->fetch_assoc();
//Get Broker Fee
$rate = "SELECT BrokerFee From Broker Where BrokerName='$user'";
$rateresult = $conn->query($rate);
$rowresult = $rateresult->fetch_assoc();
$PayRate = $rowresult[BrokerFee];

$DriverTotal = (((100 - $PayRate) * $rowsum1['SUM(Total)'])/100);
$DueTotal = (((100 - $PayRate) * $rowsum['SUM(Total)'])/100);

echo "From: $start to $end for $user ";
echo "<table id='t01' class='center'>"; // start a table tag in the HTML
echo "<tr> <th>TicketID</th> <th>Date</th> <th>TruckID</th> <th>Hauler</th> <th>Driver</th> <th>Rate</th> <th>Tons/Hours</th> <th>Total</th> <th>Approval</th>  <th>Paid Status</th> </tr> ";

while($row = $result->fetch_assoc())
{
		$Approval = "Approved";
		if ($row['Approval'] == 0 )
		{
				$Approval="Not Approved";

		}

		$Paid = "Paid";
		if ($row['Paid'] == 0 )
		{
				$Paid="Not Paid";

		}
		echo "<tr><td>" . $row['TicketID'] . "</td><td>" . $row['TicketDate']  . "</td><td>" . $row['TruckID'] . "</td><td>" . $row['HaulerName'] . "</td><td>" . $row['DriverName'] . "</td><td>" ."$" .round($row['Rate'],2) . "</td><td>" . round($row['Amount'],2) . "</td><td>" ." $". round($row['Total'],2) . "</td><td>". "$Approval" .  "</td><td>". "$Paid" . "</td></tr>";
		//$row['index'] the index here is a field name

}


echo "<tr> <td colspan='10' style='text-align:center' > Broker Total: $".round($rowsum1['SUM(Total)'], 2)." </td> </tr> ";
echo "<tr> <td colspan='10' style='text-align:center' >  Total: $".round($DriverTotal, 2)." @  Broker Fee of  ".$PayRate."% </td> </tr> ";
echo "<tr> <td colspan='10' style='text-align:center' >  Total Amount  Due: $".round($DueTotal,2)." @  Broker Fee of  ".$PayRate."% </td> </tr> ";
$conn->close();
echo "</table>"; //Close the table

?>
