<?php
include('config/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodies</title>
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<body>
    	<section class="nav">
    		<div class="container">
    			<header>
    			<div class="logo">
    				<img src="img/logoo.png" class="imglogo">
    			</div>
    			<div class="menu">
    				<ul>
                        <li> 
                            <a href="<?php echo SITEURL ;?>index.php">Home</a>
                        </li>
                        <li> 
                            <a href="<?php echo SITEURL ;?>foods.php">Foods</a>
                        </li>
                         <li> 
                            <a href="<?php echo SITEURL ;?>Categories.php">Categories</a>
                        </li>
                        <li> 
                            <a href="#contact">Contact</a>
                        </li>
                        <li> 
                            <a href="<?php echo SITEURL.'admin/loginn.php'?>">Admin</a>
                        </li>

    				</ul>
    			</div>
                <div class="clearfix"></div>
    			</header>

	    </section>