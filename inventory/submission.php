<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if(isset($_POST['submit']))
{
	$id=$_GET['id'];
	$submission = $_POST['remark'];
	$query="update request set remark=? where id=?";
	$stmt = $mysqli->prepare($query);
	$rc=$stmt->bind_param('si',$submission,$id);
	$stmt->execute();

	if($stmt){
		echo"<script>alert('Updated successfull');</script>";
		header("location:view-request.php");
	} else {
		echo"<script>alert('Error');</script>";

	}
	
}



?>



<!doctype html>
<html lang="en" class="no-js">
<head>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Submission</title>
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
					
						<h2 class="page-title">Submit Device </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default panel-primary">
									<div class="panel-heading ">Requests Details</div>
									<div class="panel-body">
										<form method="post"  action="" class="form-horizontal">
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
                            <input type="text"  name="" value="<?php echo $row->name;?>"  class="form-control" readonly> </div>
					    </div>
				        <div class="form-group">
				            <label class="col-sm-2 control-label">Staff / Student ID:</label>
		                <div class="col-sm-8">
	                        <input type="text" class="form-control" name="" id="cns" value="<?php echo $row->sid;?>" readonly>
						 </div>
						</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">contact:</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" name="contact" value="<?php echo $row->contact;?>" readonly>
								</div>
							</div>

                            <div class="form-group">
								<label class="col-sm-2 control-label">Selected Device(s):</label>
								<div class="col-sm-8">
								<input type="text" class="form-control" name="device_name" value="<?php echo $row->device_name;?>" readonly>
								</div>
							</div>

							
						
						<div class="form-group">
						<label class="col-sm-2 control-label">Submission : </label>
						<div class="col-sm-8">
						<select name="remark" class="form-control" required="required">
						<option value="" class="text-danger bg-dnager"><?php echo "Submission was: ".$row->remark;?></option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
						</select>
						<?php } ?>
						</div>
						</div>

						<div class="col-sm-8 col-sm-offset-2">
													
							<input class="btn btn-primary" type="submit" name="submit" value="Update Submission">
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

