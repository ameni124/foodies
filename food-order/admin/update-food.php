<?php
include('partie/menu.php');
?>
<?php
if (isset($_GET ['id'])){
	$id =$_GET['id'];
		$sql2= "SELECT * FROM food WHERE id=$id";
        
		$res2= mysqli_query($conn,$sql2);
		if ($res2==TRUE){
			$count =mysqli_num_rows($res2);
			if ($count==1){
				$rows=mysqli_fetch_assoc($res2);

                  $title = $rows['title'];
                  $description = $rows['description'];
                  $price = $rows['price'];
                  $current_category = $rows['category_id'];
                  $current_image=$rows['image_name'];
                  $featured=$rows['featured'];
                  $active=$rows['active'];
			}
			else{
				//redirect to manage category
				$_SESSION['no_category_found']="<div class='error'>	Category not found</div>";
				header("location:".SITEURL.'admin/manage-food.php');
			}

		}
}
else{
	header("location:".SITEURL.'admin/manage-food.php');
}


	?>
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Update Food</h1>

		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-2">
				<tr>
					<td>Title :</td>
					<td><input type="text" name="title" value="<?php echo $title; ?>" required></td>
				</tr>
                <tr>
					<td>description :</td>
					<td><textarea name="description"  cols="30" rows="5"><?php echo $description ; ?></textarea></td>
				</tr>
                <tr>
					<td>price:</td>
					<td><input type="number" name="price" value="<?php echo $price; ?>"></td>
				</tr>
				<tr>
					<td>current Image :</td>
					<td>
					<?php
					if($current_image!=''){
						?>
						<img src="<?php echo SITEURL;?>img/food/<?php echo $current_image ;?>"width="250px">
						<?php
					}
					else{
						echo "<div class='error'>Image not availeble </div>";
					}
					?>	
					</td>
				</tr>
				<tr>
					<td>New Image:</td>
					<td><input type="file" name="image"></td>
				</tr>
                <tr>
                    <td>Category</td>
                    <td>
                     <select name="category" >
                        <?php
                        $sql = "SELECT * FROM category WHERE active='Yes'";
                        $res= mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                            if ($count>0)
                        {
                            while($rows1=mysqli_fetch_assoc($res))
                            {
                                 $category_id=$rows1['id'];
                                 $category_title=$rows1['title'];
                            
                                 ?>

                                 <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_title; ?></option>

                            <?php
                            }

                        }
                            
                            else{
                                 ?>
                                    <option value='0'>category not available</option>
                                <?php
                                 }
                         

                        ?>

                     </select>
                    </td>
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
                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
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
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
$current_image=$_POST['current_image'];
$featured=$_POST['featured'];
$active=$_POST['active'];

//update image
if(isset($_FILES['image']['name'])){
	$image_name=$_FILES['image']['name'];
	if($image_name!=""){
	$ext =end(explode('.', $image_name));
	//rename image
	$image_name="Food_Category_".rand(000,999).'.'.$ext;
	$source_path =$_FILES['image']['tmp_name'];
	$detination_path= "../img/food/".$image_name;
	$upload=move_uploaded_file($source_path,$detination_path);
	if($upload==false){
		$_SESSION['upload'] ="<div class='error'>Failed to upload image</div>";
		header("location:".SITEURL.'admin/manage-food.php');
		die();
		}
//remove the current image
		if ($current_image!=""){
		$path ="../img/food/".$current_image;
		$remove= unlink($path);
		if ($remove==false){
			$_SESSION['remove-failed']="<div class='error'>Failed to remove image</div>";
			header("location:".SITEURL.'admin/manage-food.php');
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

echo $category;

//update database
$sql3 = "UPDATE food SET 
title = '$title' ,
description = '$description',
price = $price,
category_id = $category,
image_name='$image_name',
featured='$featured',
active='$active'
WHERE id='$id'
";
//execute query
$res3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));;
if($res3==TRUE){
	$_SESSION['update']="<div class='success'>Food Updated Successfuly.</div>";
		header("location:".SITEURL.'admin/manage-food.php');
	
}
else
{
	$_SESSION['update']="<div class='error'>Failed to Update food </div>";
	header("location:".SITEURL.'admin/manage-food.php');

}}
?>
<?php
include('partie/footer.php');
?>
