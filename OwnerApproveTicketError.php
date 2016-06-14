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
	<link rel="stylesheet" href="css/styleDisplayDriverData.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<style>

body {margin:0;}
.header{
	background-color:#333;
	overflow-y:hidden;
	font-family:'Roboto Slab', serif;
	font-size:16px;
	position: relative;
}

.header-wrapper{
	width:100%;
	margin: 0 auto;
	text-align: left;
	position: fixed;
	z-index: 99;
}

.header ul{
	background-color:#333;
	list-style-type:none;
	padding: 0;
	margin: 0;
	top: 0;
	position: relative;
	z-index: 101;
}

.header ul li{
	display:inline-block;
	color: white;
}

.header ul li:hover{
	background-color: #888;
}

.header ul li a,visited{
	color: white;
	display:block;
	padding: 16px;
	text-decoration: none;
}

.header ul li a:hover{
	color: white;
	text-decoration: none;
}

.header ul li:hover ul{
	display: block;
}

.header ul ul{
	display: none;
	position: absolute;
	top: 53px;
	z-index:1000;
}

.header ul ul li{
	display: block;
}

.active {
	background-color:#999;
}

</style>
</head>
<body>
<div class="header">
	<div class="header-wrapper">
	<ul>
	<li><a href="home.php">Home</a></li><li>
		<a href="#hauler">Haulers</a>
			<ul>
				<li><a href="/AddHauler.php">Add Hauler</a></li>
				<li><a href="/RemoveHauler.php">Remove Hauler</a></li>
			</ul></li><li>

		<li><a href="#brk">Brokers</a>
			<ul>

				<li><a href="/OwnerDisplayBrokerTicket.php">View Tickets</a></li>
				<li><a href="/OwnerPaidTicket.php">Update Paid Tickets</a></li>
			<li><a href=/TicketSearch.php>Unpaid Ticket Search</a></li>
				<li><a href="/AddBroker.php">Add Broker</a></li>
				<li><a href="/RemoveBroker.php">Remove Broker</a></li>
			</ul></li><li>
		<a class="active" href="#drvr">Driver</a>
			<ul>

				<li><a href="/AddTicketOwner.php">Add Ticket</a></li>
				<li><a href="/OwnerDisplayDriverTicket.php">View Tickets</a></li>
<li><a href=/OwnerRemoveTicket.php>Remove Ticket</a></li>
				<li><a href="/OwnerApproveTicket.php">Approve Tickets</a></li>
				<li><a href="/AddDriver.php">Add Driver</a></li>
				<li><a href="/RemoveDriver.php">Remove Driver</a></li>
			</ul></li><li>
			<a href="#trk">Trucks</a>
			<ul>
				<li><a href="/AddTruck.php">Add Truck</a></li>
				<li><a href="/RemoveTruck.php">Remove Truck</a></li>
			<li><a href=/OwnerDisplayTruckTicket.php>Revenue Report</a></li>
			</ul></li><li>
			<a href="#ex">Expenses</a>
			<ul>

				<li><a href="/OwnerAddExpense.php">Add Expense</a></li>
<li><a href=/OwnerViewExpense.php>View Expense</a></li>
	<li><a href=/OwnerApproveExpense.php>Approve Expense</a></li>
<li><a href=/RemoveExpense.php>Remove Expense</a></li>
				<li><a href="/AddVendor.php">Add Vendor</a></li>
				<li><a href="/RemoveVendor.php">Remove Vendor</a></li>
				<li><a href="/AddExpenseType.php">Add Expense Type</a></li>
				<li><a href="/RemoveExpenseType.php">Remove Expense Type</a></li>
				`</ul></li><li>
   			<a  href="#acc">Account</a>
   			<ul>
   			<li><a href="/ChangeOwnerPassword.php">Change Password</a></li>
			</ul></li>
		<li style = "float:right"><a href="logout.php">Logout</a></li>
		<li style = "float:right; color:#FFF; background-color:#333; padding: 14px 16px;"><?php echo "Welcome, "; echo $_COOKIE[uname]."!"; ?></li>
	</ul>
	</div>
</div>




<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo"><br/> </h1>
		</div>
		<div class="ticket-box animated fadeInUp">
			<div class="box-header">
				<h2>Tickets To Approve </h2>
			<form action="OwnerApproveTicket.php" method="post">
			</div>
			Error Approving Tickets, Try Again!
			<br/>
			<label for="driver">Select Driver:</label>
			<br/>
			<select name='driver' id='driver'>
			<option value='*'>All</option>
			<?php
				require('./GetDriver.php');
			?>
			</select>
			<br/>
			<br/>
			<button type="submit">Generate Report</button>
			</form>
			<br/>
			<br/>
			<form action="OwnerApproveSubmit.php" method="post">
			<?php include('OwnerApproveTicketInfo.php'); ?>
			<br/>
			<button type="submit">Submit Approve List</button>
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
