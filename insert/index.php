<?php
	require '../connect.inc.php';
	$err = '';
	$msg = '';

	if (isset($_FILES['up_image']) && isset($_POST['roll']) && isset($_POST['name']) && isset($_POST['class']) && isset($_POST['institute'])) {

		$rollno = $_POST['roll'];
		$name = $_POST['name'];
		$class = $_POST['class'];
		$institute = $_POST['institute'];
		// echo "czdg";
		$file=$_FILES['up_image'];
		$file_name=$file['name'];
		$file_tmp_loc=$file['tmp_name'];
		$file_ext=explode('.',$file_name);
		$file_ext=strtolower(end($file_ext));
		$file_new_name = uniqid().".".$file_ext;
		

		$query = "INSERT INTO `students`(`name`, `roll_no`, `class`, `institute`) VALUES ('". $name ."','". $rollno ."','". $class ."', '". $institute ."')";

		if(!empty($file) && !empty($rollno) && !empty($name) && !empty($class) && !empty($institute)){
			if(move_uploaded_file( $file_tmp_loc , 'images/'.$file_new_name )){
				if ($result = mysqli_query($con, $query)) {
					$last_line = passthru('python upload_index.py '. $file_new_name . ' ' . $rollno);
					$msg = 'Data entered successfuly.';
					unlink('images/'.$file_new_name);
				}else{
					$err =  'Cannot connect to database.';
				}
			}else{
				$err = 'Some error occured.';
			}
		}else{
			$err = 'Please fill all the fields.';
		}

		// $last_line = shell_exec("upload_index.py " . $file_new_name);

		// echo $last_line;




			 
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pehchaan : Enter Details</title>

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

  <div class="container" style="max-width:600px;padding:40px 20px;background:#ebeff2; margin-top: 10%;border-radius: 10px;">
	<h3>Enter Details:</h3>
<?php 
	if(!empty($msg)){
?>
	<div class="alert alert-success">
	  <strong><?php echo $msg;?></strong>
	</div>
<?php 
	}
	if(!empty($err)){
?>
	<div class="alert alert-danger">
	  <strong><?php echo $err;?></strong>
	</div>
<?php
	}
?>
	<form class="form-horizontal" role="form" action="index.php" method="post" enctype='multipart/form-data'>
	   <div class="form-group">
	      <label for="name" class ="control-label col-sm-3">Name:</label>
		<div class="col-sm-8">
	      <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
		</div>
	    </div>
	   <div class="form-group">
	      <label for="class" class ="control-label col-sm-3">Class:</label>
		<div class="col-sm-8">
	      <input type="number" min='1' max='12' name="class" class="form-control" id="class" placeholder="Enter class">
		</div>
	    </div>
	   <div class="form-group">
	      <label for="institute" class ="control-label col-sm-3">Institute:</label>
		<div class="col-sm-8">
	      <input type="text" name="institute" class="form-control" id="institute" placeholder="Enter institute">
		</div>
	    </div>



	   <div class="form-group">
	      <label for="roll" class ="control-label col-sm-3">Roll Number:</label>
		<div class="col-sm-8">
	      <input type="text" name="roll" class="form-control" id="roll" placeholder="Enter roll no.">
		</div>
	    </div>	   
	    <div class="form-group">
	      <label for="file" class ="control-label col-sm-3">Upload File:</label>
		<div class="col-sm-8">
	      <input type="file" name="up_image" class="form-control" id="file">
		</div>
	    </div>
	  
	   <div class="col-sm-offset-2 col-sm-8">
	     <button type="submit" class="btn btn-default">Insert</button>
	   </div>
	</form>
</div>


	<!-- <form action="index.php" method="post" enctype='multipart/form-data'>
		
		Roll Number: <bt>
		<input type="text"  maxlength="14" required>
		
		Upload File:
		<input type="file"  accept="image/*" required>

		<input type="submit" value="Submit">
	</form> -->
</body>
</html>