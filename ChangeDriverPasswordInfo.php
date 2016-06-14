<html>
<body>

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

$Driver = $_COOKIE[login];
$OldP = $_POST["old"];
$NewP = $_POST["new"];
$NewP2 = $_POST["new2"];

echo $Driver;
echo $OldP;
echo $NewP;
echo $NewP2;

//Run Query to authenticate User
$sql = "SELECT  password FROM Driver Where login='$Driver'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row[password];

if($NewP2 != $NewP ||  $OldP != $row[password])
{	
	    header('Location: http://www.luistrucking.com/ChangeDriverPasswordError.php');
		return;
}
else
{
		 echo "Changed Password!";
		 $sql = "Update Driver Set password='$NewP' Where login='$Driver'";
		 $A =  mysqli_query($conn,$sql);
	    header('Location: http://www.luistrucking.com/ChangeDriverPasswordOkay.php');
		return;
}

?>

</body>
</html>
