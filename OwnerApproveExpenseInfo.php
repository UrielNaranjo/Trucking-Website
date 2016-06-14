<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$user =$_POST["driver"];

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
	 $sql = "SELECT * FROM Expense Where Approve='0' ORDER BY ExpenseDate DESC";
}
else
{
	 $sql = "SELECT * FROM Expense Where DriverName ='$user' and Approve='0' ORDER BY ExpenseDate DESC";
}

$result = $conn->query($sql);

echo "<table id='t01' class='center'>"; // start a table tag in the HTML
echo "<tr> <th>Approve</th> <th>Date</th> <th>TruckID</th> <th>Driver</th> <th>Vendor</th> <th>Type</th> <th>Description</th> <th>Total</th>   </tr> ";

while($row = $result->fetch_assoc())
{
		$Approval = "Approved";
		if ($row['Approval'] == 0 )
		{
				$Approval="Not Approved";

		}
		echo "<tr><td>" ." <input type='checkbox' name='check_list[]' value='".$row['ExpenseID']."'</td><td>"   . $row['ExpenseDate'] . "</td><td>" . $row['TruckID'] . "</td><td>" . $row['DriverName']  . "</td><td>" . $row['VendorName'] . "</td><td>". $row['ExpenseType']. "</td><td>" . $row['Details'] . "</td><td>" ." $". round($row['Amount'],2)  ."</tr></td>";
		

}

$conn->close();
echo "</table>"; //Close the table

?>
