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
	header('Location: http://www.luistrucking.com/DriverRemoveTicketError.php');

	return;
}

//For Ever Item in the list
if(!empty($_POST['check_list']))
{
		foreach($_POST['check_list'] as $check)
		{
	 		echo $check;
			$sql = "DELETE FROM Ticket Where TicketID='$check'";
			$result = $conn->query($sql);
			if (!$result)
			{
					
					header('Location: http://www.luistrucking.com/DriverRemoveTicketError.php');
					return;
			}
		}
}

$conn->close();

header('Location: http://www.luistrucking.com/DriverRemoveTicketOkay.php');

?>
