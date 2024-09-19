<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();



if(isset($_GET['del']))
{
	$id=intval($_GET['del']);
	$adn="delete from request where id=?";
		$stmt= $mysqli->prepare($adn);
		$stmt->bind_param('i',$id);
        $stmt->execute();
        $stmt->close();	   
        echo "<script>alert('Data Deleted');</script>" ;
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
	<title>Records</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/font-awesome.min.css">
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
						<h3 class="page-title" style="padding-top:2%;">Request Details</h3>
						<div class="panel panel-default panel-primary">
							<div class="panel-heading ">All Request Details</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Sno.</th>
											<!-- <th>Request Id</th> -->
											<th>Full Name</th>
											<th>Staff / Student ID</th>
											<th>Contact</th>
											<th>Location</th>
											<th>Status</th>
											<th>Device Name</th>
											<th>Date</th>
											<th>Submission</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>
<?php	
$aid=$_SESSION['id'];
$ret="select * from request order by id desc";
$stmt= $mysqli->prepare($ret) ;

$stmt->execute() ;//ok
$res=$stmt->get_result();
$cnt=1;
while($row=$res->fetch_object())
	  {
	  	?>

<td><?php echo $cnt;;?></td>
<td><?php echo $row->name;?></td>
<td><?php echo $row->sid;?></td>
<td><?php echo $row->contact;?></td>
<td><?php echo $row->location;?></td>
<td><?php echo $row->status;?></td>
<td><?php echo $row->device_name;?></td>
<td><?php echo $row->date;?></td>
<td><a href="submission.php?id=<?php echo $row->id;?>"><i class="fa fa-exchange" ></i></a>&nbsp;&nbsp;<?php echo $row->remark;?></td>
<td><a href="edit-request.php?id=<?php echo $row->id;?>"><i class="fa fa-edit"></i>Edit</a>&nbsp;&nbsp; 
<a href="view-request.php?del=<?php echo $row->id;?>"><i class="fa fa-close text-danger">Delete</i></a>&nbsp;&nbsp;
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
