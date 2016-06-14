<?php



	function get_driver()
	{
			$str='';
			$str=$_POST['std'];
			$names = get_data_driver();
			$count = 0;
			foreach ($names as $name)
			{
					//$str.='<option value="'.$names[0][1].'">'.$name.'</option>';

					echo "['".$names[$count][0]."',  ";
					echo $names[$count][1]."],";
					$count++;
			}


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

	//get_driver();

?>
