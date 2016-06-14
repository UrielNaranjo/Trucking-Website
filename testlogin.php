<html>
<body>

<?php
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$login = $_POST["username"];
$password_u = $_POST["password"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "SELECT DriverName, password, IsAdmin FROM Driver Where login='$login'";
$result = $conn->query($sql);

//if Num Row == 0 then not a valid user;

if ($result->num_rows > 0)
{
		//Get Data From User
		 while($row = $result->fetch_assoc())
		 {
		 	if($row[password] == $password_u)
			 {
					 echo "Welcome ";
					 echo "$row[DriverName]";
					 //Set Cookies
					 $cookie_name = "login";
					 $cookie_value = $login;
					 setcookie($cookie_name, $cookie_value, time() + (86 * 1), '/');
					 $cookie_name = "uname";
					 $cookie_value = "$row[DriverName]";
					 setcookie($cookie_name, $cookie_value, time() + (86 * 1), '/');
					 $cookie_name = "admin";
					 $cookie_value = "$row[IsAdmin]";
					 setcookie($cookie_name, $cookie_value, time() + (86 * 1), '/');
					
					 if($row[IsAdmin])
					 {
					 	//Redirect Page
					 	header('Location: http://www.luistrucking.com/home.php');
					 }
					 else
					 {
						header('Location: http://www.luistrucking.com/home_driver.php');
					 }

			 }
			 else
			 {
					header('Location: http://www.luistrucking.com/login_error.html');
			 }
		 }
}
else
{	
		header('Location: http://www.luistrucking.com/login_error.html');
}
$conn->close();

?><br>



</body>
<script>
window.location.replace("http://google.com/");
</script>
</html>
