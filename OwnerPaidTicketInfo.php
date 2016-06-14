<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$user =$_POST["broker"];

if($user == "")
{
		$user="*";
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//Run Query to authenticate User
if($user == '*')
{
	 $sql = "SELECT * FROM Ticket Where Paid='0' ORDER BY TicketDate DESC";
}
else
{
	 $sql = "SELECT * FROM Ticket Where BrokerName ='$user' and Paid='0' ORDER BY TicketDate DESC";
}

$result = $conn->query($sql);

echo "<table id='t01' class='center'>"; // start a table tag in the HTML
echo "<tr> <th>Paid</th><th>TicketID</th> <th>Date</th> <th>TruckID</th> <th>Driver</th> <th>Hauler</th> <th>Broker</th> <th>Rate</th> <th>Tons/Hours</th> <th>Total</th>   </tr> ";

while($row = $result->fetch_assoc())
{
		$Approval = "Approved";
		if ($row['Approval'] == 0 )
		{
				$Approval="Not Approved";

		}
		echo "<tr><td>" ." <input type='checkbox' name='check_list[]' value='".$row['TicketID']."'</td><td>"  . $row['TicketID'] . "</td><td>" . $row['TicketDate']  . "</td><td>" . $row['TruckID'] . "</td><td>". $row['DriverName']. "</td><td>" . $row['HaulerName'] . "</td><td>" . $row['BrokerName'] . "</td><td>" ."$" .round($row['Rate'],2) . "</td><td>" . round($row['Amount'],2) . "</td><td>" ." $". round($row['Total'],2)."</tr></td>";
		

}

$conn->close();
echo "</table>"; //Close the table

?>
