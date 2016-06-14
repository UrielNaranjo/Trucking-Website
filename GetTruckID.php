<?php

	function get_broker()
	{
			$str='';
			$str=$_POST['std'];
			$names = get_data($std);

			foreach ($names as $name)
			{
					$str.='<option value="'.$name.'">'.$name.'</option>';
			}

			return $str;
	}

	function get_data ($std)
	{
			
			 //Create a Broker Array
			 $Brokers=array();

			 $servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
			 $username = "Luis";
			 $password = "Luis1234";
			 $dbname = "LuisTrucking";
			
			 $conn = new mysqli($servername, $username, $password, $dbname);
			 $sql = "SELECT TruckID FROM Truck";
			 $result = $conn->query($sql);

			 while($row = $result->fetch_assoc())
			 {
					 //Load an Array wih the brokers
					 $Brokers[] = $row[TruckID];
			 }

			 return $Brokers;
	}

	  echo get_broker();
?>

