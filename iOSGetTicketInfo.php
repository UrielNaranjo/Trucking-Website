<?php
// Helper method to get a string description for an HTTP status code
// From http://www.gen-x-design.com/archives/create-a-rest-api-with-php/
function getStatusCodeMessage($status)
{
// these could be stored in a .ini file and loaded
// via parse_ini_file()... however, this will suffice
// for an example
$codes = Array(
100 => 'Continue',
101 => 'Switching Protocols',
200 => 'OK',
201 => 'Created',
202 => 'Accepted',
203 => 'Non-Authoritative Information',
204 => 'No Content',
205 => 'Reset Content',
206 => 'Partial Content',
300 => 'Multiple Choices',
301 => 'Moved Permanently',
302 => 'Found',
303 => 'See Other',
304 => 'Not Modified',
305 => 'Use Proxy',
306 => '(Unused)',
307 => 'Temporary Redirect',
400 => 'Bad Request',
401 => 'Unauthorized',
402 => 'Payment Required',
403 => 'Forbidden',
404 => 'Not Found',
405 => 'Method Not Allowed',
406 => 'Not Acceptable',
407 => 'Proxy Authentication Required',
408 => 'Request Timeout',
409 => 'Conflict',
410 => 'Gone',
411 => 'Length Required',
412 => 'Precondition Failed',
413 => 'Request Entity Too Large',
414 => 'Request-URI Too Long',
415 => 'Unsupported Media Type',
416 => 'Requested Range Not Satisfiable',
417 => 'Expectation Failed',
500 => 'Internal Server Error',
501 => 'Not Implemented',
502 => 'Bad Gateway',
503 => 'Service Unavailable',
504 => 'Gateway Timeout',
505 => 'HTTP Version Not Supported'
);

return (isset($codes[$status])) ? $codes[$status] : '';
}

// Helper method to send a HTTP response code/message
function sendResponse($status = 200, $body = '', $content_type = 'text/html')
{
$status_header = 'HTTP/1.1 ' . $status . ' ' . getStatusCodeMessage($status);
header($status_header);
header('Content-type: ' . $content_type);
echo $body;
}

function dbConnect()
{
$servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
$username = "Luis";
$password = "Luis1234";
$dbname = "LuisTrucking";

$User = $_POST["login"];
$Driver =$_POST["name"];
$TruckID = $_POST["taskOption"];
$Hauler = $_POST["hauler"];
$Tons = $_POST["tons"];
$TicketID = $_POST["user"];
$PayRate =$_POST["payrate"];
$Broker =$_POST["broker"];
$Date =$_POST["date"];
$Amount = $PayRate * $Tons;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

//Run Query to authenticate User
$sql = "INSERT INTO Ticket (TicketID, TicketDate, Rate, Amount, Total, DriverName, TruckID, BrokerName, Approval, Paid, HaulerName) VALUES ('$TicketID', '$Date', '$PayRate','$Tons','$Amount', '$Driver', '$TruckID', '$Broker', FALSE, FALSE, '$Hauler')";

if(!mysqli_query($conn,$sql))
{
sendResponse(403, 'Bad');
return false;
}
else
{
sendResponse(200, 'Good');
return true;
}

}

dbConnect();
?>

