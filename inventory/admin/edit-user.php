<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if($_POST['submit'])
{
	$id=$_GET['id'];
	$fname=$_POST['firstName'];
	$mname=$_POST['middleName'];
	$lname=$_POST['lastName'];
	$gender=$_POST['gender'];
	$contactno=$_POST['contact'];
	$emailid=$_POST['email'];
	// $password=$_POST['password'];
	
	$query="update userregistration set firstName=?,middleName=?,lastName=?,gender=?,contact=?,email=?,password=? where id=?";
	$stmt = $mysqli->prepare($query);
	$rc=$stmt->bind_param('sssssssi',$fname,$mname,$lname,$gender,$contactno,$emailid,$password,$id);
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
	<title>Edit Course</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>000

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Edit User </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default panel-primary">
									<div class="panel-heading">Edit User's Details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal">
												<?php	
												$id=$_GET['id'];
	$ret="select * from userregistration where id=?";
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
						<label class="col-sm-2 control-label">First Name </label>
					<div class="col-sm-8">
					<input type="text"  name="firstName" value="<?php echo $row->firstName;?>"  class="form-control"> </div>
					</div>
				 <div class="form-group">
				<label class="col-sm-2 control-label">Middle Name</label>
		<div class="col-sm-8">
	<input type="text" class="form-control" name="middleName" id="cns" value="<?php echo $row->middleName;?>">
						 </div>
						</div>
<div class="form-group">
	<label class="col-sm-2 control-label">Last Name</label>
	<div class="col-sm-8">
	<input type="text" class="form-control" name="lastName" value="<?php echo $row->lastName;?>" >
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Gender</label>
	<div class="col-sm-8">
	<input type="text" class="form-control" name="gender" value="<?php echo $row->gender;?>" >
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Contact</label>
	<div class="col-sm-8">
	<input type="text" class="form-control" name="contact" value="<?php echo $row->contactNo;?>" >
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label">Password</label>
	<div class="col-sm-8">
	<input type="text" class="form-control " name="" value="<?php echo "This cannot be changed " .md5($row->password);?>" readonly>
	</div>
</div>


<?php } ?>
												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Update User">
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
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</script>
</body>

</html>