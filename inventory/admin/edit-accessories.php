<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if($_POST['submit'])
{
$dname=$_POST['device_name'];
$id=$_GET['d_id'];
$query="update device set device_name=? where d_id=?";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('si',$dname,$id);
$stmt->execute();
echo"<script>alert('Device Details has been Updated successfully');</script>";
header("location:manage-accessories.php");
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
	<title>Edit Device Details</title>
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
</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-8">
					
						<h2 class="page-title">Edit Accessories </h2>
	
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Edit Accessories' Details</div>
									<div class="panel-body">
                                         <form method="post" name="editform" class="form-horizontal" onsubmit="return validateform()">
                                    <?php	
                                    $id=$_GET['d_id'];

                                    $ret="select * from accessories where d_id=?";
                                        $stmt= $mysqli->prepare($ret) ;
                                    $stmt->bind_param('i',$id);
                                    $stmt->execute() ;//ok
                                    $res=$stmt->get_result();
                                    //$cnt=1;
                                    while($row=$res->fetch_object())
                                    {
                                        ?>
                                        <div class="hr-dashed"></div>
                                        <div class="form-group">
                                        <label class="col-sm-2 control-label">Description:  </label>
                                    <div class="col-sm-8">
                                    <input type="text"  name="device_name" value="<?php echo $row->description;?>"  class="form-control"> </div>
                                    </div>
                                <div class="form-group">
                                <label class="col-sm-2 control-label">quantity: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $row->quantity;?>">
                                        <!-- <span class="help-block m-b-none">Device no can't be changed.</span> -->
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-sm-2 control-label">Status:  </label>
                                    <div class="col-sm-8">
                                    <input type="text"  name="device_name" value="<?php echo $row->status;?>"  class="form-control"> </div>
                                    </div>
                                        <div class="form-group">
                                                                            


                                        <?php } ?>
												<div class="col-sm-8 col-sm-offset-2">
													
													<input class="btn btn-primary" type="submit" name="submit" value="Update ">
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