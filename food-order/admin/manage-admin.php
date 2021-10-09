<?php
include('partie/menu.php');
?>
<!--main content starts-->
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Manage Admin</h1>	
		<?php
		if(isset($_SESSION['add'])){
			echo $_SESSION['add'];
			unset($_SESSION['add']);
		}
		if(isset($_SESSION['delete'])){
			echo $_SESSION['delete'];
			unset($_SESSION['delete']);
		}	
		if(isset($_SESSION['update'])){
			echo $_SESSION['update'];
			unset($_SESSION['update']);
		}
		if(isset($_SESSION['user-not-found'])){
			echo $_SESSION['user-not-found'];
			unset($_SESSION['user-not-found']);
		}
		/*if(isset($_SESSION['pass-not-match'])){
			echo $_SESSION['pass-not-match'];
			unset($_SESSION['pass-not-match']);
		}*/	
		/*if(isset($_SESSION['change-password'])){
			echo $_SESSION['change-password'];
			unset($_SESSION['change-password']);
		}	*/			
		?>
		<br>
		<table class="tbl-full">
			<tr>
				<th>S.N</th>
				<th>Full Name</th>
				<th>Username</th>
				<th>Actions</th>
			</tr>
		<?php
		$sql = "SELECT * FROM admin";
		$res = mysqli_query($conn,$sql);
		if($res==TRUE){
			$count =mysqli_num_rows($res);
			$sn=1;
			if ($count>0)
			{
				while($rows=mysqli_fetch_assoc($res))
				{
					$id=$rows['id'];
					$full_name=$rows['full_name'];
					$username=$rows['username'];
					?>
			<tr>
				<td><?php echo $sn++; ?></td>
				<td><?php echo $full_name; ?></td>
				<td><?php echo $username; ?></td>
				<td>
					<a href="<?php echo SITEURL ;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-change">Change Password</a>
					<a href="<?php echo SITEURL ;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
					<a href="<?php echo SITEURL ;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-del">Delete Admin</a>
				</td>
			</tr>
			<?php				

				}
			}
			else
			{

			}
		
		}
		?>
					
		</table>
		<br>
		<!--button to add admin-->
		<a href="add-admin.php" class="btn-primary">Add Admin</a>
	</div>
</div>
<!--main content ends-->
<?php
include('partie/footer.php');
?>