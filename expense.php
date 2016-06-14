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
		background-color: #88;
}

.active {
		background-color: #888;
}

</style>
</head>
<body>
<ul>
<li><a href="#home">Home</a></li>
<li><a href="#news">Haulers</a></li>
	<li><a href="#contact1">Brokers</a></li>
	<li><a href="/home.php">Drivers</a></li>
<li><a href="#home4">Trucks</a></li>
<li><a class="active" href="/expense.php">Expenses</a></li>
	<li><a href="luistrucking.html">Logout</a></li>
</ul>


<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"><br/> </h1>
		</div>
		<div class="ticket-box animated fadeInUp">
			<div class="box-header">
				<h2>New Expense Entry </h2>
			<form action="UploadExpense.php" method="post">
			</div>
			<label for="TruckID">Truck ID:</label>
			<br/>
			<select name='taskOption' id='taskOption'>
			<?php
				require('./GetTruckID.php');
			?>
			</select>
			<br/>

			<label for="expensetype">Expense Type:</label>
			<br/>

			<select name='expensetype' id='expensetype'>
			<?php
				require('./GetExpenseType.php');
			?>
			</select>
			</br>

			
		<!--	<label for="driver">Driver:</label>
			<br/>
			<select name='driver' id='driver'>
			<?php
				//require('./GetDriver.php');
			?>
			</select>
			<br/>
		-->	
			<label for="vendor">Vendor:</label>
			<br/>

			<select name='vendor' id='vendor'>
			<?php
				require('./GetVendor.php');
			?>
			</select>
			<br/>
			<label for="time">Date:</label>
			<br/>
			<input type="date" name="date" id="date">
			<br/>
			<label for="description">Description:</label>
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
