<?php
include('partie/menu.php');
?>

<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Add Admin</h1>
		<?php
		if(isset($_SESSION['add'])){
			echo $_SESSION['add'];
			unset($_SESSION['add']);//remove session msg
		}
		?>

		<form action="" method="POST">
			<table class="tbl-2">
				<tr>
					<td>Full Name :</td>
					<td><input type="text" name="full_name" placeholder="  Enter your name" required></td>
				</tr>
				<tr>
					<td>Username :</td>
					<td><input type="text" name="username" placeholder="  Enter your username" required></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td><input type="password" name="password" placeholder="  Enter your password" required></td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
				</tr>
			</table>
		</form>
	</div>
</div>



<?php
include('partie/footer.php');
?>

<?php
//from FORM to database
if(isset($_POST['submit'])){
//get data
	$full_name =$_POST['full_name'];
	$username =$_POST['username'];
	$password =md5($_POST['password']);
//save data into base
$sql = "INSERT INTO admin (full_name,username,password) VALUES ('$full_name','$username','$password')";
//execute query
$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($res==TRUE){
	$_SESSION['add']="<div class='success'>Admin Added Successfuly</div>";
	header("location:".SITEURL.'admin/manage-admin.php');
}
else{
	$_SESSION['add']="<div class='error'>Failed to add admin</div>";
	header("location:".SITEURL.'admin/add-admin.php');

}
}
?>

