<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();



if(isset($_POST['submit'])){
	$fullName = $_POST['name'];
	$staffStudentId = $_POST['sid'];
	$contact = $_POST['contact'];
	$location = $_POST['location'];
	$status = $_POST['status'];
	$deviceName = $_POST['device_name'];
	$remark= "No";

  
	// $checkbox1=$_POST['item_name'];  
	$chk="";  
	foreach($deviceName as $chk1)  
	 {  
		$chk .= $chk1.",";  
	 } 

	 if(empty($_POST['device_name'])){
		 $dv_err= "Select device";
	 }else 
	 {
		$query= "insert INTO request (name,sid, contact,location,status,device_name, remark) 
	values('$fullName','$staffStudentId', '$contact','$location','$status','$chk', '$remark');";
	if(mysqli_query($mysqli, $query)){
		echo"<script>alert(' Request Successfully');</script>";
		header("location:view-request.php");
	} else {
		echo "Error: " . $sql . "
		" . mysqli_error($mysqli);
	   }
	 }
	

}

?>
<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">

	<title>Request</title>
	
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
		<!-- 
			MULTI SELECT LINK
		-->
	<link rel="stylesheet" href="css/select-bootstrap.min.css">
	<link rel="stylesheet" href="css/select-bootstrap-multiselect.css">

			<!-- 
		END OF MULTISELECT
		 -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<script src="js/bootstrap-multiselect.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	</script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h3 class="page-title " style="padding-top:1.3%;">New Request </h3>

						<div class="row">
							<div class="col-md-12">
								<div >
									<div class="panel-heading bg-primary">Fill all Info</div>
									<div class="panel-body">
			<form method="post" action="request.php" name="request" class="form-horizontal" onSubmit="return valid()">
											
										

<div class="form-group">
<!-- <label class="col-sm-2 control-label"> Registration No : </label> -->
<div class="col-sm-8">
<!-- <input type="text" name="regno" id="regno"  class="form-control" required="required" > -->
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Full Name : </label>
<div class="col-sm-8">
<input type="text" name="name" id="name"  class="form-control" required="required" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Student / Staff ID:</label>
<div class="col-sm-8">
<input type="text" name="sid" id="sid"  class="form-control" required="required">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" minlength="10" maxlength="10" pattern="[0-9]*" tittle="Please enter only digits" required="required"><span id="numloc"></span><br>
</div>
</div>
<!-- new filed  -->
<div class="form-group">
<label class="col-sm-2 control-label">Location: </label>
<div class="col-sm-8">
<!-- <input type="text" name="contact" id="contact"  class="form-control" required="required"><span id="numloc"></span><br> -->
<input type="text" name="location" id="location"  class="form-control" required="required"><span id="numloc"></span><br>
</div>
</div>
<!--  -->

<div class="form-group">
<label class="col-sm-2 control-label">Status : </label>
<div class="col-sm-8">
<select name="status" class="form-control" required="required">
<option value="">Select status</option>
<option value="Student">Student</option>
<option value="Lecturer">Lecturer</option>
<option value="Staff">Staff</option>
<option value="Others">Others</option>
</select>
</div>
</div>

<!-- Select ting from device table -->

			  

<div class="form-group">
<label class="col-sm-2 control-label">Select Device : </label>

<div class="col-sm-8">
<?php
	$data="";
	$query="SELECT * FROM device";
	$result=mysqli_query($mysqli,$query);
	while($row=mysqli_fetch_array($result)){
		$data.='<option type="checkbox" value=" '.$row["id"].''.' '.$row["device_name"].' ">'.$row["id"].' '.$row["device_name"].'</option>';
	}
	?>

<select type="checkbox"id="framework" name="device_name[]" multiple class="form-control text-primary" required="required">
<!-- <option value="">Select Device</option> -->
<?php echo $data;?>

</select>

</div>
<!-- <span><?php echo $dv_err; ?></span> -->
</div>
<?php ?>


<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-danger" type="reset">Cancel</button>
<input type="submit" name="submit" Value="Submit" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<!-- <script src="js/jquery.min.js"></script> -->
	
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>


	<!-- multiselect -->
	<script src="js/select-jquery.min.js"></script>
	<script src="js/select-bootstrap-multiselect.js"></script>
	<script src="multiselect/select-bootstrap.min.js"></script>
</body>
</html>
<!-- initializing a script -->
<script>
    $(document).ready(function(){
     $('#framework').multiselect({
      nonSelectedText: 'Select A Device',
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
      buttonWidth:'380px',
	  	  
     });
      
     
    });

    </script>
	