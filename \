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
$sql = "SELECT DriverName, password FROM Driver Where login='$login'";
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
					 setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
					 $cookie_name = "uname";
					 $cookie_value = "$row[DriverName]";
					 setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


					 if(!isset($_COOKIE[$cookie_name])) {
							     //echo "Cookie named '" . $cookie_name . "' is not set!";
					 } else {
							     echo "Cookie '" . $cookie_name . "' is set!<br>";
								     echo "Value is: " . $_COOKIE[$cookie_name];
					 }

            header('Location: http://www.luistrucking.com/home.php');

			 }
			 else 
			 {
                     echo "Wrong UserName or Password!";
	                 echo "<script> alert('Wrong UserName or Password!')</script>";


			 }
   		 }
}
else
{		
		echo "Wrong UserName or Password!";
        header("Location: " . $_SERVER["HTTP_REFERER"]);
	    echo "<script> alert('Wrong UserName or Password!')</script>";
}
$conn->close();

?><br>



</body>
<script>
window.location.replace("http://google.com/");
</script>
</html>
