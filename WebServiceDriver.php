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

$driverName = "";

function GetName(){

global $driverName;


if (isset($_POST["login"])) {

$user_id = $_POST["login"];

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

$sql = "SELECT DriverName, login, password FROM Driver";
$result = $conn->query($sql);


while($row = $result->fetch_assoc()) {
if($row[login] == $user_id){
$driverName = $row[DriverName];

}

}
$conn->close();
}

}

function PullTicks(){

global $driverName;


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

$sql = "SELECT * FROM Ticket";
$result = $conn->query($sql);

$resultArray = array();
$tempArray = array();

while($row = $result->fetch_assoc()) {
if($row[DriverName] == $driverName){

// Add each row into our results array
$tempArray = $row;
array_push($resultArray, $tempArray);
}

}
echo json_encode($resultArray);
$conn->close();
}

GetName();
PullTicks();

?>
