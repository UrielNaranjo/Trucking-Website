<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$ExpenseType = $_POST["expensetype"];

echo $ExpenseType;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "DELETE FROM ExpenseType Where ExpenseTypeName='$ExpenseType'";

if(!mysqli_query($conn,$sql))
{
header('Location: http://www.luistrucking.com/RemoveExpenseTypeError.php');
}
else
{
header('Location: http://www.luistrucking.com/RemoveExpenseTypeOkay.php');
}



?>

</body>
</html>
