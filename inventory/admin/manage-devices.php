<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	// $id=$_GET['id'];
	$adn="delete from device where d_id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        // echo "<script>alert('Data Deleted');</script>" ;
		echo "<script>alert('Data Deleted');</script>" ;
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Manage Devices</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
			<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="padding-top: 3%;">Manage Devices</h2>
						<div class="panel panel-default panel-primary ">
							<div class="panel-heading">All Devices Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<th>Device Name</th>
											<!-- <th>Model Number</th> -->
											<!-- <th>Mac Address</th> -->
											<!-- <th>Serial Number</th> -->
											<th>Uhas Label</th>
											<th>Location</th>
											<th>Status</th>
											<!-- <th>Remark</th> -->
											<!-- <th>Posting Date</th> -->
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
<?php	
// $aid=$_SESSION['d_id'];
$ret="SELECT * FROM device ORDER by d_id desc";
$stmt= $mysqli->prepare($ret) ;
//$stmt->bind_param('i',$aid);
$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>
<tr><td><?php echo $cnt;;?></td>
<td><?php echo $row->device_name;?></td>
<td><?php echo $row->uhas_label;?></td>
<td><?php echo $row->location;?></td>
<td><?php echo $row->status;?></td>
<!-- <td><?php echo $row->posting_date;?></td> -->
<td><a href="edit-device.php?d_id=<?php echo $row->d_id;?>"><i class="fa fa-eye text-primary"></i></a>&nbsp;&nbsp; 
	<a href="edit-device.php?d_id=<?php echo $row->d_id;?>"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp; 
<a href="manage-devices.php?del=<?php echo $row->d_id;?>"><i class="fa fa-close text-danger">Delete</i></a>&nbsp;&nbsp;
</td>
										</tr>
									<?php
$cnt=$cnt+1;
									 } ?>
											
										
									</tbody>
								</table>

								
							</div>
						</div>

					
					</div>
				</div>

			

			</div>
		</div>
	</div>

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

</body>

</html>
