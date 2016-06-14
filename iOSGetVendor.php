<?php

	function get_data_vendor ()
	{
			
			 //Create a Broker Array
			 $Brokers=array();

			 $servername = "luis.cylcbbatmizc.us-west-2.rds.amazonaws.com";
			 $username = "Luis";
			 $password = "Luis1234";
			 $dbname = "LuisTrucking";
			
			 $conn = new mysqli($servername, $username, $password, $dbname);
			 $sql = "SELECT  VendorName FROM Vendor";
			 $result = $conn->query($sql);

			 while($row = $result->fetch_assoc())
			 {
					 //Load an Array wih the brokers
					 $Brokers[] = $row[VendorName];
			 }

			 echo json_encode($Brokers);
	}

	get_data_vendor();
?>
