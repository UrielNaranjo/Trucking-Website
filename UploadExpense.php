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
$Vendor = $_POST["vendor"];
$ExpenseType = $_POST["expensetype"];
$Amount =$_POST["amount"];
$Description =$_POST["description"];
$Date =$_POST["date"];

echo $User;
echo $Driver;
echo $TruckID;
echo $Vendor;
echo $ExpenseType;
echo $Amount;
echo $Description;
echo $Date;

if (strlen($Date) == 0 || strlen($Description) == 0 || strlen($Amount) == 0 || $Amount == 0 )
{

		header('Location: http://www.luistrucking.com/DriverAddExpenseError.php');
		return;
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "INSERT INTO Expense (ExpenseDate, ExpenseType, VendorName, Amount, DriverName, TruckID, Details, Approve)
VALUES ('$Date', '$ExpenseType', '$Vendor', '$Amount', '$Driver', '$TruckID', '$Description', 0);";

echo $sql;

if(!mysqli_query($conn,$sql))
{

		header('Location: http://www.luistrucking.com/DriverAddExpenseError.php');
}
else
{

		header('Location: http://www.luistrucking.com/DriverAddExpenseOkay.php');
}


?>

</body>
</html>
