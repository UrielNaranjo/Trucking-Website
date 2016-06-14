<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";



$Driver =$_COOKIE[uname];
$Expense = $_POST["expensetype"];

echo $User;
echo $Expense;

if (strlen($Expense) == 0)
{

header('Location: http://www.luistrucking.com/AddExpenseTypeError.php');
		return;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "INSERT INTO ExpenseType (ExpenseTypeName) VALUES ('$Expense')";

if(!mysqli_query($conn,$sql))
{

header('Location: http://www.luistrucking.com/AddExpenseTypeError.php');
}
else
{

header('Location: http://www.luistrucking.com/AddExpenseTypeOkay.php');
}


?>

</body>
</html>
