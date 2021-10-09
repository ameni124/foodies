<?php
include('partie/menu.php');
?> 
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Manage Food</h1>
		<?php

		if(isset($_SESSION['update'])){
			echo $_SESSION['update'];
			unset($_SESSION['update']);//remove session msg
		}
			if(isset($_SESSION['add'])){
			echo $_SESSION['add'];
			unset($_SESSION['add']);//remove session msg
			}
			if(isset($_SESSION['delete'])){
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);//remove session msg
			}
			if(isset($_SESSION['upload'])){
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);//remove session msg
			}
			
				if(isset($_SESSION['no_category_found'])){
				echo $_SESSION['no_category_found'];
				unset($_SESSION['no_category_found']);//remove session msg
			}
			if(isset($_SESSION['unauthorize'])){
				echo $_SESSION['unauthorize'];
				unset($_SESSION['unauthorize']);//remove session msg
			}
		?>
<table class="tbl-full">
			<tr>
				<th>S.N</th>
				<th>Title</th>
				<th>Image</th>
				<th>Descreption</th>
				<th>Price</th>
				<th>Featured</th>
				<th>Active</th>
				<th>Action</th>
			</tr>
			<?php
		$sql = "SELECT * FROM food";
		$res = mysqli_query($conn,$sql);
		if($res==TRUE){
			$count =mysqli_num_rows($res);
			$sn=1;
			if ($count>0)
			{
				while($rows=mysqli_fetch_assoc($res))
				{
					$id=$rows['id'];
					$title=$rows['title'];
					$image_name=$rows['image_name'];
					$featured=$rows['featured'];
					$active=$rows['active'];
					$descreption=$rows['description'];
					$price=$rows['price'];
					?>
			<tr>
				<td><?php echo $sn++; ?></td>
				<td><?php echo $title; ?></td>
				<td><?php 
				if ($image_name!="") {
				 ?>
				<img src="<?php echo SITEURL; ?>img/food/<?php echo $image_name; ?>" width="100px">	
				<?php 
				}
				else{
				echo "<div class='error'>Image not added</div>";
				}
				 ?>
				</td>
				<td><?php echo $descreption; ?></td>
				<td><?php echo $price; ?></td>
				<td><?php echo $featured; ?></td>
				<td><?php echo $active; ?></td>
				<td>
					<a href="update-food.php?id=<?php echo $id;?>" class="btn-secondary">Update Food</a>
					<a href="delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="
					btn-del">Delete Food</a>
					<!--<a href="<?php //echo SITEURL ;?>admin/update-category.php?id=<?php //echo $id;?>" class="btn-secondary">Update Category</a>
					<a href="<?php //echo SITEURL ;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php//echo $image_name;?>" class="btn-del">Delete Category</a>!-->
				</td>
			</tr>
			<?php				

				}
			}
			else
			{
				?>
				<tr>
					<td colspan="7"><div class="error">No food added</div></td>
				</tr>
		<?php	
		}
		}
		?>		
		</table>
		<br>
		<!--button to add admin-->
		<a href="add-food.php" class="btn-primary">Add Food</a>
	</div>
</div>



<?php
include('partie/footer.php');
?>