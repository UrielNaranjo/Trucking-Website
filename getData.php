
<?php



	function get_driver()
	{
			$str='';
			$str=$_POST['std'];
			$names = get_data_driver();
			$count = 0;

			echo '{ "cols": [ {"id":"","label":"Expense","pattern":"","type":"string"}, {"id":"","label":"Cost","pattern":"","type":"number"} ],';
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
			
			 $conn = new mysqli($servername, $username, $password, $dbname);
			 $sql = "SELECT ExpenseType, SUM(Amount) FROM Expense Group By ExpenseType";
			 $result = $conn->query($sql);

			 $count = 0;

			 while($row = $result->fetch_assoc())
			 {
					 //Load an Array wih the brokers
					 $Brokers[$count][0] = $row[ExpenseType];
					 $Brokers[$count][1] = $row['SUM(Amount)'];
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
