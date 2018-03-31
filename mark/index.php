<?php
	ini_set('max_execution_time', 0);
	if (isset($_FILES['group_img'])) {
		$file=$_FILES['group_img'];
		$file_name=$file['name'];
		$file_tmp_loc=$file['tmp_name'];
		$file_ext=explode('.',$file_name);
		$file_ext=strtolower(end($file_ext));
		$file_new_name = uniqid().".".$file_ext;
		
		move_uploaded_file( $file_tmp_loc , 'images/'.$file_new_name );

		$last_line = passthru('python upload_group.py '. $file_new_name);
		// echo $file_name;
		header('Location: ../home/');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pehchaan : Mark Attendance</title>

	<script type="text/javascript" src="../webcamjs/webcam.min.js"></script>

		<!-- Latest compiled and minified CSS -->
	<!-- for bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>

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


  	<div class="container" style="max-width:600px;padding:40px 20px;background:#ebeff2; margin-top: 10%;border-radius: 10px;">
		<h3>Mark Attendance:</h3>
		<form class="form-horizontal" name="myform" role="form" action="index.php" method="post" enctype='multipart/form-data'>
		   <!-- <div class="form-group">
		      <label for="name" class ="control-label col-sm-3">Roll Number:</label>
			<div class="col-sm-8">
		      <input type="name" name="roll" class="form-control" id="name" placeholder="Enter name">
			</div>
		    </div> -->
		   <div class="form-group">
		      <label for="address" class ="control-label col-sm-3">Upload File:</label>
			<div class="col-sm-8">
				<div id="my_camera"></div>
				<input type=button value="Take Snapshot" onClick="take_snapshot()">
				<div id="results" ></div>
		      <input style="margin-top: 10px;" type="file" name="group_img" class="form-control" id="address">
			</div>
		    </div>
		  
		   <div class="col-sm-offset-2 col-sm-8">
		     <button type="submit" class="btn btn-default">Mark</button>
		   </div>
		</form>
	</div>


	<!-- <form method="post" action="attendance.php" enctype='multipart/form-data'>
		Upload Class Image:
		<input type="file" name="group_img">
		<input type="submit" value="Submit">
	</form> -->


<style>
	#my_camera{
	 width: 320px;
	 height: 240px;
	 border: 1px solid black;
	}
</style>

	
	
	 
	
	 
	<!-- Webcam.min.js -->
	<script type="text/javascript" src="webcamjs/webcam.min.js"></script>

	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
	 Webcam.set({
	  width: 320,
	  height: 240,
	  image_format: 'jpeg',
	  jpeg_quality: 90
	 });
	 Webcam.attach( '#my_camera' );

	<!-- Code to handle taking the snapshot and displaying it locally -->
	function take_snapshot() {
	 
	 // take snapshot and get image data
	 Webcam.snap( function(data_uri) {
	  // display results in page
	  document.getElementById('results').innerHTML = 
	  '<img src="'+data_uri+'"/>';
	  	document.forms["myform"]["group_img"].value = data_uri;
	  } );
	}
</script>
		
</body>
</html>