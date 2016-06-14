<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$sql = "SELECT DriverName FROM Driver";
$result = $conn->query($sql);

echo "n Number of Rows n";
echo $result->num_rows;


if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo " $row[DriverName]";
}
} else {
echo "n 0 results n";
}
$conn->close();

?>
