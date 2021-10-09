       <?php
include('partie-front/menu.php');
?>

    <!-- CAtegories Section Starts Here -->
        <section class="categories">
            <div class="container">
                <h1 class="font1">Explore Now</h1>
                <h2 class="font2">Categories</h2>
        <?php
        $sql = "SELECT * FROM category WHERE active='Yes'";
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
            </div>
        </section>
<?php
include('partie-front/footer.php');
?>