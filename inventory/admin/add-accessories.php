<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();


if(isset($_POST['submit']))
{
$description=$_POST['description'];
$quantity=$_POST['quantity'];
$status=$_POST['status'];

$sql = "insert into accessories (description,quantity,status)
	values ('$description','$quantity', '$status');";
   if(mysqli_query($mysqli, $sql)){
	echo"<script>alert('accessory added succesfully');</script>";
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
	<title>Add Accessories</title>
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
                        <h3 class="page-title" style="margin-top:5%;">Add Accessory </h3>
                            <div class="col-md-12">
                                <div class="row">
                                <div class="panel panel-default panel-primary">
                                    <div class="panel-heading">Input Accessory's details</div>
                                    <div class="panel-body">
                                        <form method="post" name="myform"class="row " onsubmit="return validateform()">
                                             <div class="col-md-6">
                                                <label for="itemDescription" class="form-label">Description:</label>
                                                <input type="text" name="description" class="form-control" id="itemDescription" placeholder="eg: 5m HDMI cable  or type C-HDMI converter...... ">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="itemDescription" class="form-label">Qunatity:</label>
                                                <input type="text" name="quantity" class="form-control" id="numloc" placeholder="eg:1,2,3....." >
                                                <br>

                                            </div>


                                            <div class="col-md-6">
                                                <label for="status" class="form-label">Status:</label>
                                                <select name="status" id="inputStatus" class=" form-control form-select">
                                                    <option value="">Choose...</option>
                                                    <option value="1">Active </option>
                                                    <option value="0">Faulty</option>
                                                </select>
                                            </div>

                                            
                                            <div class="col-md-3 text-center" style="margin-top:2%;">
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
            var description = document.myform.description.value;
            var quantity = document.myform.quantity.value;
            var status = document.myform.status.value;
            
            if (description== null || description == ""){
                Swal.fire({
                    icon: "error",
                    text: "Enter accessory description",
                    });
                return false;
            }else if (quantity== null || quantity== ""){
                Swal.fire({
                    icon: "error",
                    text: "Enter quantity",
                    });
                return false;
            }else if (isNaN(quantity)){
                Swal.fire({
                    icon: "error",
                    title: "Quantity",
                    text: "Enter numeric value only",
                    });
                return false;
                
            }else if (status== null || status==""){
                Swal.fire({
                    icon: "error",
                    text: " Select accessory's status",
                    });
                return false;
            }
        }

    </script>
</html>