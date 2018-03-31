<?php
	$con = mysqli_connect("localhost","root","","pehchaan");

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	  // echo 'hello';
?>