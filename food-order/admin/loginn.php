<?php
include('../config/connect.php');
?>
<html>
<head>
    <title>login form</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="admin.css" rel ="stylesheet">
</head>

<body class="log">	
		<div class="logoo">
    <img src="../img/logo2.png" class="imglogo">
</div>		
<div class="login">

<div class="container">

	<h4>Log In</h4>
	<hr>
	<br>
		<?php
		if(isset($_SESSION['login'])){
			echo $_SESSION['login'];
			unset($_SESSION['login']);//remove session msg
		}
			if(isset($_SESSION['no-login-message'])){
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);//remove session msg
		}
		?>
	<form method="POST" action="">
		<label class="text-bold">login</label>
		<input type="text" name="username" required>
		<label class="text-bold">password</label>
		<input type="password" name="password" required>
		<br><br>
		<input  type="submit" name="submit" value="login" class="btn-change">
	</form>
</div>
</div>
</body>
</html>
<?php
            if(isset($_POST['submit'])){
			 $username =$_POST['username'];
			 $password =md5($_POST['password']);
			$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$res = mysqli_query($conn,$sql);
			$count =mysqli_num_rows($res);
			if ($count==1)
			{
					$_SESSION['login']="<div class='success'>Login Successful</div>";
					$_SESSION['user']=$username;

					header("location:".SITEURL.'admin/');
			}
			else{
					$_SESSION['login']="<div class='error'>Login or password incorrect</div>";
					header("location:".SITEURL.'admin/loginn.php');

			}	
		}

?>

	