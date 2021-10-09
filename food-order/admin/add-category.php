<?php
include('partie/menu.php');
?>

<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Add Category</h1>

		 <?php
		if(isset($_SESSION['add'])){
			echo $_SESSION['add'];
			unset($_SESSION['add']);//remove session msg
		}
		if(isset($_SESSION['upload'])){
			echo $_SESSION['upload'];
			unset($_SESSION['upload']);//remove session msg
		}
		?>

		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-2">
				<tr>
					<td>Title :</td>
					<td><input type="text" name="title" placeholder="  Category title" required></td>
				</tr>
				<tr>
					<td>Selecte Image:</td>
					<td><input type="file" name="image"></td>
				</tr>
				<tr>
					<td>Featured :</td>
					<td>
						<div class="inline">
						<p>Yes</p><input  type="radio" name="featured" value="Yes">
						<p>No</p><input  type="radio" name="featured" value="No"></div>
					</td>
				</tr>
				<tr>
					<td>Active :</td>
					<td>
						<div class="inline"> 
						<p>Yes</p><input type="radio" name="active" value="Yes">
						<p>No</p><input type="radio" name="active" value="No"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="submit" name="submit" value="Add Category" class="btn-secondary"></td>
				</tr>
			</table>
		</form>

	</div>
</div>

<?php
//from FORM to database
if(isset($_POST['submit'])){
//get data
	$title = $_POST['title'];
if(isset($_POST['featured'])){			
	$featured = $_POST['featured'];
	}	
else{
	$featured ="No";
	}
if(isset($_POST['active'])){			
	$active = $_POST['active'];				
	}	
else{
	$active = "No";
	}
if(isset($_FILES['image']['name'])){
	$image_name = $_FILES['image']['name'];
	if($image_name!=""){
	//auto rename
	$ext =end(explode('.', $image_name));
	//rename image
	$image_name="Food_Category_".rand(000,999).'.'.$ext;
	$source_path =$_FILES['image']['tmp_name'];
	$detination_path= "../img/category/".$image_name;
	$upload=move_uploaded_file($source_path,$detination_path);
	if($upload==false){
		$_SESSION['upload'] ="<div class='error'>Failed to upload image</div>";
		header("location:".SITEURL.'admin/add-category.php');
		die();
		}
	}
}
else{
	$image_name="";
}
$sql = "INSERT INTO category (title,featured,active,image_name) VALUES ('$title','$featured','$active','$image_name')";
$res = mysqli_query($conn,$sql)or die(mysqli_error($conn));
if($res == TRUE){
	$_SESSION['add']="<div class='success'>Category Added Successfuly</div>";
	header("location:".SITEURL.'admin/manage-category.php');
}
else{
	$_SESSION['add']="<div class='error'>Failed to add Category</div>";
	header("location:".SITEURL.'admin/add-category.php');
}
}
?>
<?php
include('partie/footer.php');
?>