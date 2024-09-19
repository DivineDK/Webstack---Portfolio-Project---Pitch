<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if($_POST['submit'])
{
	$id=$_GET['id'];
	$fullName = $_POST['name'];
	$staffStudentId = $_POST['sid'];
	$contact = $_POST['contact'];
	$status = $_POST['status'];
	$deviceName = $_POST['device_name'];

	$chk="";  
	foreach($deviceName as $chk1)  
	 {  
		$chk .= $chk1.",";  
	 } 

	
	$query="update request set name=?,sid=?,contact=?,status=?,device_name=? where id=?";
	$stmt = $mysqli->prepare($query);
	$rc=$stmt->bind_param('sssssi',$fullName,$staffStudentId,$contact,$status,$chk,$id);
	$stmt->execute();
	echo"<script>alert('Updated successfull');</script>";
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
	<title>Edit Request</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- multi -->
   
    <link rel="stylesheet" href="css/select-bootstrap-multiselect.css">
    <!-- <link rel="stylesheet" href="css/select-bootstrap.min.css"> -->

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<!-- <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script> -->
<!-- <script type="text/javascript" src="js/validation.min.js"></script> -->

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit Request </h2>
	
						<div class="row">
							<div class="col-md-12">
								<!-- <div class="panel panel-default"> -->
									<div class="panel-heading bg-primary">Requests Details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
												<?php	
										$id=$_GET['id'];
										$ret="select * from request where id=?";
											$stmt= $mysqli->prepare($ret) ;
										$stmt->bind_param('i',$id);
										$stmt->execute() ;//ok
										$res=$stmt->get_result();
										//$cnt=1;
										while($row=$res->fetch_object())
										{
											?>
						<!-- <div class="hr-dashed"></div> -->
                        
					<div class="form-group">
						<label class="col-sm-2 control-label">Full Name: </label>
					<div class="col-sm-8">
					<input type="text"  name="name" value="<?php echo $row->name;?>"  class="form-control"> </div>
					</div>
				 <div class="form-group">
				<label class="col-sm-2 control-label">Staff / Student ID:</label>
		            <div class="col-sm-8">
	               <input type="text" class="form-control" name="sid" id="cns" value="<?php echo $row->sid;?>">
						 </div>
						</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">contact:</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" name="contact" value="<?php echo $row->contact;?>" >
								</div>
							</div>

							<?php } ?>

						<div class="form-group">
						<label class="col-sm-2 control-label">Status : </label>
						<div class="col-sm-8">
						<select name="status" class="form-control" required="required">
						<option value="">Select status</option>
						<option value="Student">Student</option>
						<option value="Staff">Staff</option>
						<option value="Others">Others</option>
						</select>
						</div>
						</div>

						<?php ?>

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

							</div>
							<?php ?>






												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Update Request">
												</div>
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

</script>
</body>

</html>

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