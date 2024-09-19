<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

// send data to databse

if(isset($_POST['submit']))
{
$deviceName=$_POST['name'];
$modelNumber=$_POST['modelNumber'];
$macAddress=$_POST['macAddress'];
$serialNumber=$_POST['serialNumber'];
$uhasNumber=$_POST['uhasNumber'];
$location=$_POST['location'];
$status=$_POST['status'];
$remark=$_POST['remark'];

$sql = "insert into device (device_name,model_number,mac_address,serial_number,uhas_label,location,status,remark)
	values ('$deviceName','$modelNumber','$macAddress','$serialNumber','$uhasNumber','$location','$status','$remark');";
   if(mysqli_query($mysqli, $sql)){
	echo"<script>alert('Record added succesfully');</script>";
    header("location:manage-devices.php");
   } else {
    echo "Error: " . $sql . "
    " . mysqli_error($mysqli);
   }
}
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
	<title>Add Gadgets</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
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
                        <h3 class="page-title" style="margin-top:5%;">Add Device</h3>
                            <div class="col-md-12">
                                <div class="row">
                                <div class="panel panel-default panel-primary">
                                    <div class="panel-heading">Input Device's Details</div>
                                    <div class="panel-body">
                                        <form method="post" name="myform" class="row" onsubmit="return validateform()">
                                            <div class="col-md-6" style="margin-bottom:;">
                                                <label for="inputName" class="form-label">Device Name:</label>
                                                <input type="text" name="name" class="form-control" id="inputName">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="modelNumber" class="form-label">Model Number:</label>
                                                <input type="text" name="modelNumber" class="form-control" id="modelNumber">
                                                <br>
                                            </div>
                                             

                                            <div class="col-md-6">
                                                <label for="macAddress" class="form-label">MAC Address:</label>
                                                <input type="text" name="macAddress" class="form-control" id="macAddress">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="serialNumber" class="form-label">Serial Number:</label>
                                                <input type="text" name="serialNumber" class="form-control" id="serialNumber">
                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="uhasLabel" class="form-label">UHAS Label:</label>
                                                <input type="text" name="uhasNumber" class="form-control" id="uhasLabel" placeholder="eg. UHAS/ICT/PRPJ/20/011">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="location" class="form-label">Location:</label>
                                                <input type="text" name="location" class="form-control" id="location">
                                                <br>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="status" class="form-label">Status:</label>
                                                <select id="inputStatus" name="status" class=" form-control form-select">
                                                    <option value="">Choose...</option>
                                                    <option value="1">Active </option>
                                                    <option value="0">Faulty</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="remark" class="form-label">Remarks:</label>
                                                <textarea name="remark" class="form-control" id="remark" rows="3"></textarea>
                                                
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
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
   
</body>
    <!-- js links -->
    <!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <!-- form validation -->
    <script>
        function validateform(){
            var name = document.myform.name.value;
            var modelNumber = document.myform.modelNumber.value;
            var macAddress = document.myform.macAddress.value;
            var serialNumber = document.myform.serialNumber.value;
            var uhasLabel = document.myform.uhasLabel.value;
            var location = document.myform.location.value;
            var selectValue = document.myform.status.value;

            if (name== null || name== ""){
                Swal.fire({
                    icon: "error",
                    text: "Device name can't be blank!",
                    });
                return false;
            }else if (modelNumber== null || modelNumber== ""){
                Swal.fire({
                    icon: "error",
                    text: "Model Number can't be blank!",
                    });
                return false;
            }else if (macAddress== null || macAddress==""){
                Swal.fire({
                    icon: "error",
                    text: "MAC address can't be blank!",
                    });
                return false;
            }else if (serialNumber== null || serialNumber==""){
                Swal.fire({
                    icon: "error",
                    text: "Serial number can't be blank!",
                    });
                return false;
            }else if (uhasLabel== null || uhasLabel==""){
                Swal.fire({
                    icon: "error",
                    text: "Uhas label can't be blank!",
                    });
                return false;
            }else if (location== null || location==""){
                Swal.fire({
                    icon: "error",
                    text: "Location can't be blank!",
                    });
                return false;

            }else if (selectValue == null || selectValue == ""){
                Swal.fire({
                    icon: "error",
                    text: "Status can't be blank!",
                    });
                return false;
            }
        }

    </script>
</html>