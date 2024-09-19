<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
?>


<!DOCTYPE html>
<html lang="en">
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
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
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

<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data based on the selected option
    $selectedOption = isset($_POST['options']) ? $_POST['options'] : '';

    switch ($selectedOption) {
        case 'devices':
            $deviceName = isset($_POST['device_name']) ? $_POST['device_name'] : '';
            $deviceNumber = isset($_POST['device_number']) ? $_POST['device_number'] : '';

            // Process device form data as needed
            // echo "<p>Device Name: $deviceName</p>";
            // echo "<p>Device Number: $deviceNumber</p>";

            // sending device data 
            if(!empty($_POST['device_name']) && !empty($_POST['device_number'])){
				$query="insert into device (id,device_name) values(?,?)";
				$stmt = $mysqli->prepare($query);
				$rc=$stmt->bind_param('ss',$deviceNumber,$deviceName);
				$stmt->execute();
				echo"<script>alert('Device Added Successfully');</script>";
				header("location:manage-devices.php");
								
			} else {
				echo"<script>alert('Ivalid input');</script>";
			}
            break;

        case 'accessories':
            $accessoryName = isset($_POST['accessory_name']) ? $_POST['accessory_name'] : '';

            // Process accessory form data as needed

            // echo "<p>Accessory Name: $accessoryName</p>";

            // sENDING accesory DATA
            if(!empty($_POST['accessory_name'])){
				$query="insert into device (device_name) values(?)";
				$stmt = $mysqli->prepare($query);
				$rc=$stmt->bind_param('s',$accessoryName);
				$stmt->execute();
				echo"<script>alert('Accessry Added Successfully');</script>";
				header("location:manage-devices.php");
								
			} else {
				echo"<script>alert('Ivalid input');</script>";
			}
            
            break;

        default:
            echo "<p>Invalid option selected</p>";
    }
} else {
    // Display the form if it's not submitted
    ?>

    <!-- form -->
    <?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
                        <br>
					
						<h2 class="page-title mt-5">Add New Device </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default panel-primary">
									<div class="panel-heading">Add a Device</div>
									<div class="panel-body">
									
								
                             <form method="post" action="">
                             <div class="form-group">
                                <label class="col-sm-2 control-label" for="options">Select an option:</label>
                                <select class="form-control" name="options" id="options">
                                    <option value="devices">Devices</option>
                                    <option value="accessories">Accessories</option>
                                </select>
                            </div>
                                     <br>

                            <?php
                            // Display additional inputs based on the selected option
                            ?>
                        
                        <div id="deviceInputs" style="display: none;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="device_name">Device Name:</label>
                            <div class="col-sm-3">
                            <input class="form-control"  type="text" name="device_name" id="device_name" required="required">
                            <br>
                        </div>

                            <label class="col-sm-2 control-label" for="device_number">Device Number:</label>
                            <div class="col-sm-3">
                            <input class="form-control" type="text" name="device_number" id="device_number" required="required">
                            <br>
                            </div>
                        </div>
                        </div>

                        <div id="accessoryInputs" style="display: none;">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="accessory_name">Accessory Name:</label>
                            <div class="col-sm-3">
                            <input class="form-control" type="text" name="accessory_name" id="accessory_name">
                            <br>
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-2">
                            <button type="submit">Submit</button>
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
    <!-- end of form -->
   
    <script>
        // JavaScript to show/hide form inputs based on the selected option
        document.getElementById('options').addEventListener('change', function () {
            var selectedOption = this.value;
            document.getElementById('deviceInputs').style.display = selectedOption === 'devices' ? 'block' : 'none';
            document.getElementById('accessoryInputs').style.display = selectedOption === 'accessories' ? 'block' : 'none';
        });
    </script>
    <?php
}
?>

</body>
</html>
