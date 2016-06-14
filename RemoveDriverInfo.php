<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Driver = $_POST["drivername"];

echo $User;
echo $Driver;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "DELETE FROM Driver Where DriverName='$Driver'";

if(!mysqli_query($conn,$sql))
{
		
		header('Location: http://www.luistrucking.com/RemoveDriverError.php');
}
else
{
		header('Location: http://www.luistrucking.com/RemoveDriverOkay.php');
}



?>

</body>
</html>
