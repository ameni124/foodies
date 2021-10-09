       <?php
include('partie-front/menu.php');
?>
<?php
if (isset($_GET ['category_id'])){
    $category_id =$_GET['category_id'];
    $sql= "SELECT title FROM category WHERE id=$category_id";
    $res= mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($res);
    $category_title=$rows['title'];
}
else{
    header("location:".SITEURL);
}
?>
        <section class="foodMenu">
            <div class="container">
                <h1 class="fontsize"><span>Foods on</span> <a href="#" class="text-white">"<?php echo $category_title?>"</a></h1>
                <h2 class="font2">Our Menu&nbsp &nbsp&nbsp &nbsp</h2>
                <br> 
                <?php

                $sql2= "SELECT * FROM food WHERE category_id=$category_id";
                $res2= mysqli_query($conn,$sql2);
                $count2 =mysqli_num_rows($res2);
                if ($count2>0){
                    while($rows2=mysqli_fetch_assoc($res2))
                    {   
                        $id=$rows2['id'];
                        $title=$rows2['title'];
                        $price=$rows2['price'];
                        $description=$rows2['description'];
                        $image_name=$rows2['image_name'];
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

                ?>
               
                
                <div class="clearfix"></div>
            </div>
        </section>





 <?php
include('partie-front/footer.php');
?>