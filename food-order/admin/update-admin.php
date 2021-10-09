	<?php
include('partie/menu.php');
?>
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Update Admin</h1>
		<?php
			//get the id
		$id =$_GET['id'];
			//sql query to get details
		$sql= "SELECT * FROM admin WHERE id=$id";
			//execute queryu
		$res= mysqli_query($conn,$sql);
		if ($res==TRUE){
			$count =mysqli_num_rows($res);
			if ($count==1){
				//get the details 
				$rows=mysqli_fetch_assoc($res);
					$full_name=$rows['full_name'];
					$username=$rows['username'];
			}
			else{
				//redirect to manage admin
				header("location:".SITEURL.'admin/manage-admin.php');
			}

		}
		?>


		<form action="" method="POST">
			<table class="tbl-2">
				<tr>
					<td>Full Name :</td>
					<td><input type="text" name="full_name"value="<?php echo $full_name; ?>" placeholder="  Enter your name" required></td>
				</tr>
				<tr>
					<td>Username :</td>
					<td><input type="text" name="username" value="<?php echo $username; ?>" placeholder="  Enter your username" required></td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="submit" name="submit" value="Update Admin" class="btn-secondary"></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php
//from FORM to database
if(isset($_POST['submit'])){
//get data
	 $id =$_POST['id'];
	 $full_name =$_POST['full_name'];
	 $username =$_POST['username'];

//save data into base
$sql = "UPDATE admin SET full_name='$full_name',
username='$username' 
WHERE id='$id'
";
//execute query
$res = mysqli_query($conn,$sql);
if($res==TRUE){
	$_SESSION['update']="<div class='success'>Admin Updated Successfuly.</div>";
	header("location:".SITEURL.'admin/manage-admin.php');
}
else
{
	$_SESSION['update']="<div class='error'>Failed to Update admin.</div>";
	header("location:".SITEURL.'admin/manage-admin.php');

}}
?>
<?php
include('partie/footer.php');
?>