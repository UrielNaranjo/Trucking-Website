<?php

	
	function get_data_2 ()
	{
			
			 //Create a Broker Array
			 $Haulers=array();

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
					 $Haulers[] = $row[TruckID];
			 }

			 echo json_encode($Haulers);
	}
	get_data_2();
