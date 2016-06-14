<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Driver = $_COOKIE[uname];
$Name = $_POST["name"];
$Login = $_POST["login"];
$Password = $_POST["password"];
$PayRate = $_POST["payrate"];


echo $Name;
echo $Login;
echo $Password;
echo $PayRate;

if (strlen($Name) == 0 || strlen($Login) == 0 || strlen($Password) == 0 || strlen($PayRate) == 0 || $PayRate == 0 || $PayRate >= 100 )
{

		header('Location: http://www.luistrucking.com/AddDriverError.php');
		return;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "INSERT INTO Driver ( DriverName, login, password, PayRate, IsAdmin) VALUES ('$Name', '$Login', '$Password', '$PayRate', '0')";


if(!mysqli_query($conn,$sql))
{

		header('Location: http://www.luistrucking.com/AddDriverError.php');
}
else
{

		header('Location: http://www.luistrucking.com/AddDriverOkay.php');
}


?>

</body>
</html>
