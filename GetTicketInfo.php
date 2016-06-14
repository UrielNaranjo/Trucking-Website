<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$User = $_COOKIE[login];
$Driver =$_COOKIE[uname];
$TruckID = $_POST["taskOption"];
$Hauler = $_POST["hauler"];
$Tons = $_POST["tons"];
$TicketID = $_POST["user"];
$PayRate =$_POST["payrate"];
$Broker =$_POST["broker"];
$Date =$_POST["date"];

$Amount = $PayRate * $Tons;
if (strlen($Date) == 0 || strlen($PayRate) == 0 || strlen($TicketID) == 0 || strlen($PayRate) == 0 || strlen($Hauler) == 0 || $PayRate == 0 || $Tons == 0 )
{

		header('Location: http://www.luistrucking.com/DriverAddTicketError.php');
		return;
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "INSERT INTO Ticket (TicketID, TicketDate, Rate, Amount, Total, DriverName, TruckID, BrokerName, Approval, Paid, HaulerName) VALUES ('$TicketID', '$Date', '$PayRate','$Tons','$Amount', '$Driver', '$TruckID', '$Broker', FALSE, FALSE, '$Hauler')";

if(!mysqli_query($conn,$sql))
{
		header('Location: http://www.luistrucking.com/DriverAddTicketError.php');
}
else
{
		header('Location: http://www.luistrucking.com/DriverAddTicketOkay.php');
}


?>

</body>
</html>
