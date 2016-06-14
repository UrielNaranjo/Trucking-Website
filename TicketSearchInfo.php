<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$ticketid =$_POST["ticketid"];

if( strlen($ticketid) == 0 )
{
	header('Location: http://www.luistrucking.com/TicketSearchError.php');
	return;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
//Run Query to authenticate User

$sql = "SELECT * FROM Ticket Where TicketID ='$ticketid' and Paid='0' ORDER BY TicketDate DESC";
$result = $conn->query($sql);
$sql = "SELECT * FROM Ticket Where TicketID ='$ticketid' and Paid='1' ORDER BY TicketDate DESC";
$result1 = $conn->query($sql);
$row2 = $result->fetch_assoc();
$row1 = $result1->fetch_assoc();

if(sizeof($row1) > 0 )
{
	header('Location: http://www.luistrucking.com/TicketSearchPaid.php');
	return;
}
if(sizeof($row2) == 0 )
{
	header('Location: http://www.luistrucking.com/TicketSearchNotFound.php');
	return;
}


echo "<table id='t01' class='center'>"; // start a table tag in the HTML
echo "<tr> <th>Paid</th><th>TicketID</th> <th>Date</th> <th>TruckID</th> <th>Driver</th> <th>Hauler</th> <th>Broker</th> <th>Rate</th> <th>Tons/Hours</th> <th>Total</th>   </tr> ";

$sql = "SELECT * FROM Ticket Where TicketID ='$ticketid' and Paid='0' ORDER BY TicketDate DESC";
$result = $conn->query($sql);

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
