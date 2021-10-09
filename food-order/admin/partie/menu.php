<?php
include('../config/connect.php');
include('login-check.php');
?>
<html>
<head>
	<title>Food Order - Home Page</title>
	<link rel="stylesheet" href="admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<!--menu Section starts-->
<div class="logo">
    <img src="../img/logo2.png" class="imglogo">
</div>
<div class="menu text-center">
	<div class="wrapper">

	<ul>
    					<li> 
    						<a href="index.php">Home</a>
    					</li>
    					<li> 
    						<a href="manage-admin.php">Admin</a>
    					</li>
    					<li> 
    						<a href="manage-category.php">Category</a>
    					</li>
    					<li> 
    						<a href="manage-food.php">Food</a>
    					</li>
    					<li>
    						<a href="manage-order.php">Order</a>
    					</li>
                        <li>
                            <a href="logout.php"><span>Log Out</span></a>
                        </li>
    				</ul>	
	</div>

</div>
<!--menu Section ends-->