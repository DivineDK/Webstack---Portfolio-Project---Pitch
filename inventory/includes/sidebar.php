<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
<li><a href="change-password.php"><i class="fa fa-files-o"></i>Change Password</a></li>
<li><a href="request.php"><i class="fa fa-keyboard-o"></i>New Request</a></li>
<li><a href="view-request.php"><i class="fa fa-eye"></i>View Record</a></li>
<img src="img/bg-uhaslogo.png"  alt="" style="opacity:5%; padding-top 50%" width="145px">

<?php } else { ?>
				
				<!-- <li><a href="registration.php"><i class="fa fa-files-o"></i> User Registration</a></li> -->
				<li><a href="index.php"><i class="fa fa-users"></i> User Login</a></li>
				<li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>
				<div class="img">
				<img src="img/bg-uhaslogo.png"  alt="" style="opacity:5%; padding-top 50%" width="145px">
				</div>
				
				<?php } ?>

			</ul>

		</nav>