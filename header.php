<?php
	session_start();
	
	echo "<!DOCTYPE html>\n<html><head>";
	
	require_once 'functions.php';
	
	$userstr = ' (Guest)';
	
	if (isset($_SESSION['user']))
	{
		$user = $_SESSION['user'];
		$loggedin = TRUE; //define loggedin as true
		$userstr = " ($user, you are Logged In)";
	}
	
	else $loggedin = FALSE;
	
	echo "<title>$appname$userstr</title><link rel='stylesheet' " .
		 "href='dist/css/styles.css' type='text/css'>" .
		 "</head><body><center><canvas id='logo' width='1000'" .
		 "height='150'>$appname</canvas></center>" .
		 "<div class='appname'>$appname$userstr</div>" .
		 "<script src='dist/js/javascript.js'></script>";
		 
	if ($loggedin)
		echo "<br><ul class='menu'>" .
			 "<li><a href='dashboard.php?view=$user'>Dashboard</a></li>" .
			 "<li><a href='item.php'>Item</a></li>" .
			 "<li><a href='equipment.php'>Item Label</a></li>" .
			 "<li><a href='borrower.php'>Borrower</a></li>" .
			 "<li><a href='status.php'>Status</a></li>" .
			  "<li><a href='report.php'>Report</a></li>" .
			 "<li><a href='logout.php'>Logout</a></li></ul><br>";
			 
	else
		echo "<br><ul class='menu'>" .
			  "<li><a href='index.php'>Home</a></li>" .
			  "<li><a href='login.php'>Login</a></li>" .
			  "<li><a href='summary.php'>Summary</a></li></ul><br><br>" .
			  "<span class='info'>&#8658; You must be logged in to " .
			  "update this page.</span><br><br>";
?>






