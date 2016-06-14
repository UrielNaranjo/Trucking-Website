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

if(empty($_POST['check_list']))
{
	header('Location: http://www.luistrucking.com/TicketSearchError1.php');
	return;
}

//For Ever Item in the list
if(!empty($_POST['check_list']))
{
		foreach($_POST['check_list'] as $check)
		{
	 		echo $check;
			$sql = "UPDATE Ticket SET Paid='1' Where TicketID='$check'";
			$result = $conn->query($sql);
		}
}

$conn->close();

header('Location: http://www.luistrucking.com/TicketSearch.php');

?>
