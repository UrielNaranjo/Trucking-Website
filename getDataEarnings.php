
<?php



	function get_driver()
	{
			$str='';
			$str=$_POST['std'];
			$names = get_data_driver();
			$count = 0;

			echo '{ "cols": [ {"id":"","label":"Expense","pattern":"","type":"string"}, {"id":"","label":"Earnings","pattern":"","type":"number"} ],';
			echo json_encode (rows);
			echo ": [";
			foreach ($names as $name)
			{
					//{"id":"","label":"Topping","pattern":"","type":"string"}
					echo '{';
					echo json_encode('c');
					echo ":[{";
					echo json_encode('v');
					echo ":";
					echo json_encode ($names[$count][0]);
					echo ',';
					echo json_encode('f');
					echo ":null},{";
					echo json_encode ('v');
					echo ':';
					echo ($names[$count][1]);
					echo ',';
					echo json_encode('f');
					echo ":null}]},";
					$count++;
			}
			echo "]}";


	}

	function get_data_driver ()
	{
			
			 //Create a Broker Array
			 $Brokers=array();

			 $servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
			 $username = "Luis";
			 $password = "Luis1234";
			 $dbname = "LuisTrucking";
			 $dname = $_COOKIE['uname'];
			 $currentdate = date("y-m-d");
			 $currentyear = explode('-', $currentdate)[0];
			 $currentday = "01";
			 $currentmonth = explode('-', $currentdate)[1];
			 $start = ($currentyear - 1)."-".$currentmonth."-".$currentday;
			 $end = date("y-m-d");

			 $conn = new mysqli($servername, $username, $password, $dbname);
			 $sql = "SELECT TicketDate, SUM(Total) FROM Ticket Where DriverName ='$dname' and TicketDate BETWEEN '$start' and '$end' Group By Year(TicketDate), Month(TicketDate)";

			 $result = $conn->query($sql);
			 $sql = "SELECT PayRate FROM Driver Where DriverName = '$dname'";
			 $result1 = $conn->query($sql);
			 $row1 = $result1->fetch_assoc();
			 $rate = $row1['PayRate'];
			 //echo $rate;

			 $count = 0;

			 while($row = $result->fetch_assoc())
			 {
					 $Month = 'NULL';
					 //Load an Array wih the brokers
					 if(explode('-',$row[TicketDate])[1] == '01')
					 {
							 $Month = 'January';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '02')
					 {
							 $Month = 'February';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '03')
					 {
							 $Month = 'March';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '04')
					 {
							 $Month = 'April';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '05')
					 {
							 $Month = 'May';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '06')
					 {
							 $Month = 'June';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '07')
					 {
							 $Month = 'July';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '08')
					 {
							 $Month = 'August';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '09')
					 {
							 $Month = 'September';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '10')
					 {
							 $Month = 'October';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '11')
					 {
							 $Month = 'November';
					 }
					 else if (explode('-',$row[TicketDate])[1] == '12')
					 {
							 $Month = 'December';
					 }

					 $Brokers[$count][0] = $Month;
					 $Brokers[$count][1] = round(($rate * $row['SUM(Total)'])/100,2);
					 $count++;

			 }

			 return $Brokers;
	}

	get_driver();


// This is just an example of reading server side data and sending it to the client.
// It reads a json formatted text file and outputs it.

$string = file_get_contents("sampleData.json");
//echo $string;

// Instead you can query your database and parse into JSON etc etc

?>
