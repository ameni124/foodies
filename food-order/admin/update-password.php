<?php
include('partie/menu.php');
?>
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Change Password</h1>

<br>
		<?php
			//get the id
		$id =$_GET['id'];		

		?>

		<form action="" method="POST">
			<table class="tbl-2">
				<tr>
					<td>Old Password :</td>
					<td><input type="password" name="current_password" placeholder="  Enter your old password" required></td>
				</tr>
				<tr>
					<td>New Password :</td>
					<td><input type="password" name="new_password" placeholder="  Enter your new password" required></td>
				</tr>
				<tr>
					<td>Confirm Password :</td>
					<td><input type="password" name="confirm_password" placeholder="  Enter your confirm password" required></td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="submit" value="Change Password" class="btn-secondary"></td>
				</tr>
			</table>
		</form>

<?php
//from FORM to database
if(isset($_POST['submit'])){
//get data
	 $id =$_POST['id'];
	 $current_password =md5($_POST['current_password']);
	 $new_password =md5($_POST['new_password']);
	 $confirm_password =md5($_POST['confirm_password']);
//check user exist or not 
	 $sql= "SELECT * FROM admin WHERE id=$id AND password='$current_password'";
			//execute queryu
		$res= mysqli_query($conn,$sql);
		if ($res==TRUE){
			$count =mysqli_num_rows($res);
			if ($count==1){
				if ($new_password ==$confirm_password){
					$sql2 ="UPDATE admin SET password='$new_password' 
					WHERE id=$id";
					$res2= mysqli_query($conn,$sql2);
						if ($res2==TRUE){
							$_SESSION['change-password']="<div class='success'>Password Changed Successfuly.</div>";
							header("location:".SITEURL.'admin/manage-admin.php');
					}
						else{
							$_SESSION['change-password']="<div class='error'>error</div>";
							header("location:".SITEURL.'admin/manage-admin.php');							

					}

} 
				else{ ?>
						<div class="error"><br><?php echo "Password Not Match";?><br><br></div>
					<?php
					}
			}
			else{
				?>
						<div class="error"><br><?php echo "Password Incorrect";?><br><br></div>
					<?php
			}

		}

	}
?>
<?php
include('partie/footer.php');
?>
