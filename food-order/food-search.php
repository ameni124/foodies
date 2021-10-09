<?php
include('partie-front/menu.php');
?>

        <section class="foodMenu">
            <div class="container">
            <?php 
            $search=$_POST['search'];

            ?>
                <h1><span>Foods On Search</span> <a href="x" class="text-white"><?php echo $search ;?></a></h1>
                <h2 class="font2">Our Menu&nbsp&nbsp&nbsp&nbsp</h2>
                <br>
                <?php
                    
                    $sql="SELECT * FROM food WHERE title LIKE '%$search%'OR description LIKE '%$search%'";
                    $res= mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    if($res==TRUE){
                    $count =mysqli_num_rows($res);
                    if ($count>0){
                        while($rows=mysqli_fetch_assoc($res))
                        {
                             $id=$rows['id'];
                             $title=$rows['title'];
                             $image_name=$rows['image_name'];
                             $description=$rows['description'];
                             $price=$rows['price'];
                            
                            ?>
                    <div class="food">
                    <div class="food-menu-img">
                    <?php
                    if($image_name!=''){
                    ?>
                    <img src="<?php echo SITEURL;?>img/food/<?php echo $image_name ;?>"width="250px"class="img-menu">
                    <?php
                    }
                    else{
                        echo "<div class='error'>Image not availeble </div>";
                    }
                    ?> 
                    <!--<img src="img/menu/burger1.jpg" class="img-menu">-->
                    </div>
                    <div class="food-menu-desc">
                     <h4 ><?php echo $title;?></h4>
                    <p class="price"><?php echo $price;?></p>
                    <p class="desc"><?php echo $description;?></p>
                    <a href=order.php?food_id=<?php echo $id;?> class="btn">order now</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <?php
                    }
                 }
                    else{
                        
                        echo"<div class='error'>FOOD not found</div>";
                       
                    }
                }
                
                ?> 
                
                <div class="clearfix"></div>
            </div>
        </section>
<?php
include('partie-front/footer.php');
?>
