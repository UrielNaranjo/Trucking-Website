<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Driver =$_COOKIE[uname];
$Hauler = $_POST["haulername"];

echo $User;
echo $Hauler;


if (strlen($Hauler) == 0)
{

		header('Location: http://www.luistrucking.com/AddHaulerError.php');

		return;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "INSERT INTO Hauler (HaulerName) VALUES ('$Hauler')";

if(!mysqli_query($conn,$sql))
{

	header('Location:http://www.luistrucking.com/AddHaulerError.php');
}
else
{

	header('Location:http://www.luistrucking.com/AddHaulerOkay.php');
}


?>

</body>
</html>
