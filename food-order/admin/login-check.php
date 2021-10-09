<?php
		if(!isset($_SESSION['user'])){ //if user session is not set
			$_SESSION['no-login-message']="<div class='error'>Please Login to access Admin Panel</div>";
			header("location:".SITEURL.'admin/loginn.php');
	
		}
		?>