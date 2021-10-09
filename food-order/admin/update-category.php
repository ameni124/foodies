<?php
include('partie/menu.php');
?>
<?php
if (isset($_GET ['id'])){
	$id =$_GET['id'];
		$sql= "SELECT * FROM category WHERE id=$id";
		$res= mysqli_query($conn,$sql);
		if ($res==TRUE){
			$count =mysqli_num_rows($res);
			if ($count==1){
				$rows=mysqli_fetch_assoc($res);
					$title=$rows['title'];
					$current_image=$rows['image_name'];
					$featured=$rows['featured'];
					$active=$rows['active'];
			}
			else{
				//redirect to manage category
				$_SESSION['no_category_found']="<div class='error'>	Category not found</div>";

				header("location:".SITEURL.'admin/manage-category.php');
			}

		}

}
else{
	header("location:".SITEURL.'admin/manage-category.php');
}


	?>
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Update Category</h1>

		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-2">
				<tr>
					<td>Title :</td>
					<td><input type="text" name="title" value="<?php echo $title; ?>"placeholder="  Category title" required></td>
				</tr>
				<tr>
					<td>current Image :</td>
					<td>
					<?php
					if($current_image!=''){
						?>
						<img src="<?php echo SITEURL;?>img/category/<?php echo $current_image ;?>"width="250px">
						<?php
					}
					else{
						echo "<div class='error'>Image not added </div>";
					}
					?>	
					</td>
				</tr>
				<tr>
					<td>New Image:</td>
					<td><input type="file" name="image"></td>
				</tr>
				<tr>
					<td>Featured :</td>
					<td>
						<div class="inline">
						<p>Yes</p><input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">
						<p>No</p><input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"></div>
					</td>
				</tr>
				<tr>
					<td>Active :</td>
					<td>
						<div class="inline"> 
						<p>Yes</p><input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">
				<p>No</p><input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">
			</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
					<input type="submit" name="submit" value="Update Category" class="btn-secondary"></td>
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
	 $current_image =$_POST['current_image'];
	 $title =$_POST['title'];
	 $featured = $_POST['featured'];
	 $active = $_POST['active'];
//update image
if(isset($_FILES['image']['name'])){
	$image_name=$_FILES['image']['name'];
	if($image_name!=""){
	$ext =end(explode('.', $image_name));
	//rename image
	$image_name="Food_Category_".rand(000,999).'.'.$ext;
	$source_path =$_FILES['image']['tmp_name'];
	$detination_path= "../img/category/".$image_name;
	$upload=move_uploaded_file($source_path,$detination_path);
	if($upload==false){
		$_SESSION['upload'] ="<div class='error'>Failed to upload image</div>";
		header("location:".SITEURL.'admin/manage-category.php');
		die();
		}
//remove the current image
		if ($current_image!=""){
		$path ="../img/category/".$current_image;
		$remove= unlink($path);
		if ($remove==false){
			$_SESSION['remove-failed']="<div class='error'>Failed to remove image</div>";
			header("location:".SITEURL.'admin/manage-category.php');
		die();
		}
	}
	}
	else
	{
		$image_name = $current_image;
	}

}
else{
	$image_name = $current_image;
}
//update database
$sql2 = "UPDATE category SET 
title='$title',
active='$active',
featured='$featured',
image_name='$image_name'
WHERE id='$id'
";
//execute query
$res2 = mysqli_query($conn,$sql2);
if($res2==TRUE){
	$_SESSION['update']="<div class='success'>Category Updated Successfuly.</div>";
	header("location:".SITEURL.'admin/manage-category.php');
}
else
{
	$_SESSION['update']="<div class='error'>Failed to Update Category </div>";
	header("location:".SITEURL.'admin/manage-category.php');

}}
?>
<?php
include('partie/footer.php');
?>
