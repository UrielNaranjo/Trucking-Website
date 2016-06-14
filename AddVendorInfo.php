<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Driver =$_COOKIE[uname];
$Vendor = $_POST["vendorname"];

echo $User;
echo $Vendor;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if (strlen($Vendor) == 0)
{
		  header('Location: http://www.luistrucking.com/AddVendorError.php');
		return;
}

//Run Query to authenticate User
$sql = "INSERT INTO Vendor  (VendorName) VALUES ('$Vendor')";

if(!mysqli_query($conn,$sql))
{

header('Location: http://www.luistrucking.com/AddVendorError.php');
}
else
{
header('Location: http://www.luistrucking.com/AddVendorOkay.php');
}


?>

</body>
</html>
