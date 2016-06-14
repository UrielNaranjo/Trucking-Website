<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Broker = $_POST["broker"];

echo $Broker;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "DELETE FROM Broker Where BrokerName='$Broker'";

if(!mysqli_query($conn,$sql))
{
		header('Location: http://www.luistrucking.com/RemoveBrokerError.php');
}
else
{

		header('Location: http://www.luistrucking.com/RemoveBrokerOkay.php');
}



?>

</body>
</html>
