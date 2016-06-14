<?php
	 if(!isset($_COOKIE["uname"]))
	 {
			 header('Location: http://www.luistrucking.com/');

			 return;
	
	 }
	
	 if($_COOKIE["admin"] == '0')
	 {
			 header('Location: http://www.luistrucking.com/home_sec.html');

			 return;
	 }

	$cookie_name = "login";
	$cookie_value = $_COOKIE["login"];
	setcookie($cookie_name, $cookie_value, time() + (60 * 10), "/");
	$cookie_name = "uname";
	$cookie_value = $_COOKIE["uname"];
	setcookie($cookie_name, $cookie_value, time() + (60 * 10), "/");
	$cookie_name = "admin";
	$cookie_value = $_COOKIE["admin"];
	setcookie($cookie_name, $cookie_value, time() + (60 * 10), "/");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Luis Trucking - Sign In </title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<style>
.dropbtn {
		background-color:#333;
		color: white;
		padding: 16px;
		font-size: 16px;
		border: none;
		cursor: pointer;
}

.dropdown{
		position: relative;
		display: inline-block;
}

.dropdown-content{
		display: none;
		position:relative;
		background-color: #888;
		min-width: 160px;
	<!--	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);-->
}

.dropdown-content a{
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
}

.dropdown-content a:hover{
		background-color: #888;
}

.dropdown:hover .dropdown-content{
		display: block;
}

.dropdown:hover .dropbtn{
		background-color:#888;
}
body {margin:0;}

ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
		position: fixed;
		top: 0;
		width: 100%;
}

li {
		float: left;
}

li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
}

li a:hover:not(.active) {
		background-color: #333;
}

.active {
		background-color: #333;
}




</style>
</head>
<body>
<ul>
<li><a href="home.php">Home</a></li>


<li class="dropdown">






		<button class="dropbtn" href="#hlr">Haulers</a>
		<div class="dropdown-content">
			<a href="AddHauler.php">Add Hauler</a>
			<a href="RemoveHauler.php">Remove Hauler</a>
		</div>
	</li>
<li class="dropdown">
		<button class="dropbtn" href="#drvr">Brokers</a>
		<div class="dropdown-content">
			<a href="AddBroker.php">Add Broker</a>
			<a href="RemoveBroker.php">Remove Broker</a>
		</div>
	</li>
<li class="dropdown">
		<button class="dropbtn" href="#drvr">Driver</a>
		<div class="dropdown-content">
			<a href="AddDriver.php">Add Driver</a>
			<a href="RemoveDriver.php">Remove Driver</a>

			<a href="ChangeDriverPassword.php">Change Password</a>
		</div>
	</li>
<li class="dropdown">
		<button class="dropbtn" href="#trk">Trucks</a>
		<div class="dropdown-content">
			<a href="AddTruck.php">Add Truck</a>
			<a href="RemoveTruck.php">Remove Truck</a>
			<li><a href=/OwnerDisplayTruckTicket.php>Revenue Report</a></li>
		</div>
	</li>
<li class="dropdown">
		<button class="dropbtn" href="#ex">Expenses</a>
		<div class="dropdown-content">
			<a href="AddVendor.php">Add Vendor</a>
			<a href="RemoveVendor.php">Remove Vendor</a>

			<a href="expense.php">Add Expense Type</a>

		</div>
	</li>
	<li style = "float:right"><a href="logout.php">Logout</a></li>
	<li style = "float:right; color:#fff; background-color:#333; padding: 14px 16px;" >Hi (user)!</li>
</ul>

<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"><br/> </h1>
		</div>
		<div class="ticket-box animated fadeInUp">
			<div class="box-header">
				<h2>New Expense Entry </h2>
			<form action="GetTicketInfo.php" method="post">
			</div>
			<label for="TruckID">Truck ID:</label>
			<br/>
			<select name='taskOption' id='taskOption'>
			<?php
				require('./GetTruckID.php');
			?>
			</select>
			<br/>

			<label for="Broker">Expense Type:</label>
			<br/>

			<label for="Hauler">Driver:</label>
			<br/>
			<select name='hauler' id='hauler'>
			<?php
				require('./GetHaulers.php');
			?>
			</select>
			<br/>
			<label for="Broker">Vendor:</label>
			<br/>

			<select name='broker' id='broker'>
			<?php
				require('./GetBrokers.php');
			?>
			</select>
			<br/>
			<label for="time">Date:</label>
			<br/>
			<input type="date" name="date" id="date">
			<br/>
			<label for="description">Description</label>
			<br/>
			<input type="text" name="description" id="description">
			<br/>
			<label for="amount">Amount:</label>
			<br/>
			<input type="float" name="amount" id="amount">
			<br/>
			<button type="submit">Submit</button>
			<br/>
			</form>
		</div>
	</div>

</body>

<script>
	$(document).ready(function () {
	$('#logo').addClass('animated fadeInDown');
	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
