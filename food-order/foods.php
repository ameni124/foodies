<?php
include('partie-front/menu.php');
?>


  <section class="foodMenu">
            <div class="container">
            <div class="foodSearch">
                <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                    <input type="search " name="search" class="search"  placeholder="  search for food">
                    <input type="submit" name="submit" class="btn" value="Search">
    
                </form>
            </div>
                <h2 class="font1">Order Now&nbsp &nbsp&nbsp &nbsp</h2>
                <h2 class="font2">Our Menu&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp</h2>

        <?php
        $sql2= "SELECT * FROM food WHERE active='Yes'";
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
            </div>
        </section>
<?php
include('partie-front/footer.php');
?>
ob_end_flush()