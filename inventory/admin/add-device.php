<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

		

?>

<?php

	$query2 = "select * from device order by id desc limit 1";
	$result2 = mysqli_query($mysqli,$query2);
	$row = mysqli_fetch_array($result2);
	$last_id = $row['id'];
	if ($last_id == "")
	{
		$device_ID = "DEV1";
	}
	else
	{
		$device_ID = substr($last_id, 3);
		$device_ID = intval($device_ID);
		$device_ID = "DEV" . ($device_ID + 1);
	}


?>


<?php 
		if(isset($_POST['submit']))
		{
		// postong data into device table
		$id=$_POST['id'];
		$dname=$_POST['device_name'];
		
		if(empty($_POST['id']) && empty($_POST['device_name'])){
			echo"<script>alert('Input Device name');</script>";
		} else {
			$query="insert into device (id,device_name) values(?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ss',$id,$dname);
			$stmt->execute();
			echo"<script>alert('Device Added Successfully');</script>";
			header("location:manage-devices.php");
			
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
	<title>New Device</title>
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
					
						<h2 class="page-title">Add New Device </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default panel-primary">
									<div class="panel-heading">Add a Device</div>
									<div class="panel-body">
									
										<form method="post" class="form-horizontal" >
											
											<div class="hr-dashed"></div>
											<div class="form-group">
												<label class="col-sm-2 control-label">Device Name  </label>
												<div class="col-sm-8">
												<input type="text" class="form-control" name="device_name" id="device_name" value="" required="required">
												</div>
												</div>
												
												<div class="form-group">
												<label class="col-sm-2 control-label">Unique Code (ID)</label>
												<div class="col-sm-8">
												<input type="text" class="form-control" name="id" id="id" value="<?php echo $device_ID; ?>" readonly >
												</div>
												</div>

												<div class="col-sm-8 col-sm-offset-2">
												<input class="btn btn-primary" type="submit" name="submit" value="Add Device ">
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
				<!-- adding another -->
				

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

<script>  


</script>
