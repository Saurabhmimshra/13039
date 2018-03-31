<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pehchaan : Home</title>

	<!-- for bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: rgba(12, 151, 244, 0.08)">

	  <nav class="navbar navbar-default ultra-nav navbar-fixed-top">

	    <div class="container">
	      <div class="navbar-header">
	        <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> -->
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>                        
	        </button>
	        <a class="navbar-brand make-white" href="../">Pehchaan</a>
	      </div>
	     <!--  <div class="collapse navbar-collapse" id="myNavbar">
	        <ul class="nav navbar-nav navbar-right">
	          <li><a data-scroll class="make-white" href="#about">About</a></li>
	          <li><a data-scroll class="make-white" href="#teams">Our Teams</a></li>
	          <li><a data-scroll  class="make-white"  href="#activities">Our Activities</a></li>
	          <li><a data-scroll  class="make-white" href="#contact">Contact</a></li>
	        </ul>
	      </div> -->
	    </div>
	  </nav>

	<div class="container" style="position: absolute; top: 10%;">
		<div class="row" style="    margin-left: 265px;">
		  <div class="col-sm-4">
		    <div class="card" title="Enter details of the student to store in the database" style="width: 18rem;">
			  <img class="card-img-top" src="155771014-56aa2de23df78cf772ad1bc4.jpg" alt="Card image cap" width="286" height="180">
			  <div class="card-body">
			    <h5 class="card-title" style="font-weight: bold;">Enter Deltails...</h5>
			    <p class="card-text">First enter the details of students</p>
			    <a href="../insert/" class="btn btn-primary"  style="background-color: rgb(12, 151, 244)">Insert</a>
			  </div>
			</div>
		  </div>
		 <div class="col-sm-4">
		    <div class="card" title="Click to upload classroom's snapshot for attendance." style="width: 18rem;">
			  <img class="card-img-top" src="attendance.jpg" width="286" height="180" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title" style="font-weight: bold;">Mark Attendance...</h5>
			    <p class="card-text">Mark the attendance just by a single click.</p>
			    <a href="../mark/" class="btn btn-primary" style="background-color: rgb(12, 151, 244)">Mark</a>
			  </div>
			</div>
		  </div>
		  <div class="col-sm-4">
		    <div class="card" title="Click to view today's attendance summary." style="width: 18rem;">
			  <img class="card-img-top" src="download.png" width="286" height="180" alt="Card image cap">
			  <div class="card-body">
			    <h5 class="card-title" style="font-weight: bold;">View Attendance...</h5>
			    <p class="card-text">Verify the attendance in case of any doubt.</p>
			    <a href="../fetch/" class="btn btn-primary" style="background-color: rgb(12, 151, 244)">View</a>
			  </div>
			</div>
		  </div>
		</div>
	</div>	
<!-- 
<div id="particles-js"></div>

<script src="particles.js"></script>
<script type="text/javascript">
	particlesJS.load('particles-js', 'assets/particles.json', function() {
  console.log('callback - particles.js config loaded');
});
</script> -->
</body>
</html>