<?php
session_start(); // Make sure to start the session

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) { ?>
    <div class="brand clearfix">
        <a href="#" class="logo text-center" style="font-size:15px;">Inventory Management System</a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
        <ul class="ts-profile-nav">
            <li class="ts-account">
                <a href="#"><img src="img/bg-uhaslogo.png" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
                <ul>
                    <li><a href="my-profile.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
<?php } else { ?>
    <div class="brand clearfix">
        <a href="#" class="logo" style="font-size:15px;">Inventory Management System</a>
        <span class="menu-btn"><i class="fa fa-bars"></i></span>
    </div>
<?php } ?>
