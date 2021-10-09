<?php
include('partie-front/menu-index.php');
?>
<?php
		if(isset($_SESSION['order'])){
			echo $_SESSION['order'];
			unset($_SESSION['order']);//remove session msg
		}
?>

	    </div>
	    <section id="about" class="about">
	    	<div class="container">
	    		<div class="aboutTitle">
	    		<h1 class="font1">Our Story</h1>
	    		<h1 class="font2">About Us</h1></div>
	    		<div class="aboutText">
	    			<h1>Welcome To Foodies Restaurant </h1><br>
	    		<p>Foodies’s is additionally home of the amazing Table-Side Caesar Spun Signature Salad, specially made table side from a rundown of 10 fixings including blue cheddar, shrimp, olives, banana peppers, anchovies and our homemade mystery Caesar dressing. Other house top choices are our Grilled or Chilled Shrimp, new walleye conveyed every day from Red Lake Nation in Minnesota and house ground steak burgers. 

Our menu offers something for everybody, from light passage of plates of mixed greens and little nibbles to the inconceivable  T Bone steak. Our steaks are sliced in house to guarantee flawlessness and expertly barbecued at 2,000 degrees.<br><br>
We will probably give excellent client benefit, the best quality fixings, and a noteworthy affair whether it’s an uncommon occasion.</p></div>
	    		<div class="img">
	    		<img src=" img/b.jpg" class="piza"></div>

	    	</div>
	    </section>
	    <section class="categories">
	    	<div class="container">
	    		<h1 class="font1">Explore Now</h1>
	    		<h2 class="font2">Categories</h2>
		<?php
		$sql = "SELECT * FROM category WHERE active='Yes' AND featured='Yes' LIMIT 3";
		$res = mysqli_query($conn,$sql);
		if($res==TRUE){
			$count =mysqli_num_rows($res);
			if ($count>0)
			{
				while($rows=mysqli_fetch_assoc($res))
				{
					$id=$rows['id'];
					$title=$rows['title'];
					$image_name=$rows['image_name'];
					?>

	    		<a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
		    		<div class="box1 float-container">
		    			<?php
		    				if ($image_name!="") {
							 ?>
		    			<img src="<?php echo SITEURL; ?>img/category/<?php echo $image_name; ?>" class="imgC">	
						<?php 
							}
							else{
							echo "<div class='error'>Image not added</div>";
							}			
		    				?>
		    			<h3 class="float-text font2"><?php echo $title; ?></h3>
		    		</div>
	    		</a>
				<?php
				}
			}}
			else
			{
					echo "<div class='error'>No Category added</div>";
				
		}
		?>


	    		<div class="clearfix"></div>
	    		<a href="categories.php" class="btn-2">Show All</a>	
	    	<div class="clearfix"></div>
	    	</div>
	    </section>
<section class="foodMenu">
	    	<div class="container">
	    		<h2 class="font1">Order Now&nbsp &nbsp&nbsp &nbsp</h2>
	    		<h2 class="font2">Our Menu&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp</h2>
		<?php
		$sql2= "SELECT * FROM food WHERE active='Yes' AND featured='Yes' LIMIT 6";
		$res2 = mysqli_query($conn,$sql2);
		if($res2==TRUE){
			$count2 =mysqli_num_rows($res2);
			if ($count2>0)
			{
				while($rows=mysqli_fetch_assoc($res2))
				{
					$id=$rows['id'];
					$title=$rows['title'];
					$image_name=$rows['image_name'];
					$descreption=$rows['description'];
					$price=$rows['price'];
					?>
			    		<div class="food">
			    			<div class="food-menu-img">
		    			<?php
		    				if ($image_name!="") {
							 ?>
		    			<img src="<?php echo SITEURL; ?>img/food/<?php echo $image_name; ?>" class="img-menu">	
						<?php 
							}
							else{
							echo "<div class='error'>Image not added</div>";
							}			
		    				?>
			    			</div>
			    			<div class="food-menu-desc">
			    				<h4><?php echo $title; ?></h4>
			    				<p class="price"><?php echo $price; ?></p>
			    				<p class="desc"><?php echo $descreption; ?></p>
			    				<a href="order.php?food_id=<?php echo $id;?>" class="btn">order now</a>
			    			</div>
			    			<div class="clearfix"></div>
			    		</div>
				<?php
				}
			}}
			else
			{
					echo "<div class='error'>No Category added</div>";
				
		}
		?>








	    		<div class="clearfix"></div>
	    	<a href="foods.php" class="btn-2">Show All</a>	
	    	<div class="clearfix"></div>
	    	</div>
	    </section>
<?php
include('partie-front/footer.php');
?>