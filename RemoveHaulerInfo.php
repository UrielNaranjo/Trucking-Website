<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Driver =$_COOKIE[uname];
$Hauler = $_POST["hauler"];

echo $User;
echo $Hauler;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "DELETE FROM Hauler  Where HaulerName='$Hauler'";

if(!mysqli_query($conn,$sql))
{

	header('Location: http://www.luistrucking.com/RemoveHaulerError.php');
}
else
{

	header('Location: http://www.luistrucking.com/RemoveHaulerOkay.php');
}



?>

</body>
</html>
