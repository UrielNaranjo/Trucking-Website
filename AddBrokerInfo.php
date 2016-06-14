<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Driver =$_COOKIE[uname];
$Hauler = $_POST["brokername"];
$Fee = $_POST["rate"];

echo $User;
echo $Hauler;

echo strlen($Hauler);

if (strlen($Hauler) == 0 || strlen($Fee) == 0 || $Fee > 99)
{

		header('Location: http://www.luistrucking.com/AddBrokerError.php');

		return;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "INSERT INTO Broker (BrokerName ,BrokerFee) VALUES ('$Hauler','$Fee' )";

if(!mysqli_query($conn,$sql))
{
		
		header('Location: http://www.luistrucking.com/AddBrokerError.php');
}
else
{
		header('Location: http://www.luistrucking.com/AddBrokerOkay.php');
}


?>

</body>
</html>
