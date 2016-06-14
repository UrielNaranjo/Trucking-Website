<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Driver =$_COOKIE[uname];
$Vendor = $_POST["vendor"];

echo $User;
echo $Vendor;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "DELETE FROM Vendor Where VendorName='$Vendor'";

if(!mysqli_query($conn,$sql))
{

header('Location: http://www.luistrucking.com/RemoveVendorError.php');
}
else
{
header('Location: http://www.luistrucking.com/RemoveVendorOkay.php');
}



?>

</body>
</html>
