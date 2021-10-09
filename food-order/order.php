       <?php
include('partie-front/menu.php');
?>

<?php
if (isset($_GET ['food_id'])){
    $food_id =$_GET['food_id'];
        $sql= "SELECT * FROM food WHERE id=$food_id";
        $res= mysqli_query($conn,$sql);
            $count =mysqli_num_rows($res);
            if ($count==1){
                $rows=mysqli_fetch_assoc($res);
                    $title=$rows['title'];
                    $image_name=$rows['image_name'];
                    $price=$rows['price'];
            }
            else{

                header("location:".SITEURL);
            }

}
else{
    header("location:".SITEURL);
}


    ?>
<section class="orderform">
    <div class="form">
        <form action="" method="POST">
        <fieldset>
        <legend class="font1">Selected Food</legend>
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
                        <h4><?php echo $title;?></h4>
                        <input type="hidden" name="food" value="<?php echo $food_id;?>">
                        <p class="price"><?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <p class="desc">made with italian sauce,chiken and vegetable</p>
                        <h4>quantity</h4>
                        <input type="number" name="qty" class="input-qty" value="1" required>
                    </div>
                <div class="clearfix"></div>
                </fieldset>
                <fieldset>
                    <legend class="font1">Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter Fullname" class="input" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter Phone Number" class="input" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="Enter Email" class="input" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="Enter Address" class="input" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn2">
                </fieldset>
        </form>
<?php 
if (isset($_POST['submit'])){
    $food_id = $_POST['food'];
    $price = $_POST['price'];
    $qty= $_POST['qty'];
    $total =$price * $qty;
    $order_date= date('Y-m-d h:i:s', time());
    $status = "Ordered";
    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['contact'];
    $customer_email = $_POST['email'];
    $customer_address= $_POST['address'];

$sql2 = "INSERT INTO commande (food_id,qty,total,order_date,status,customer_name,customer_contact,customer_email,customer_address) VALUES ('$food_id',$qty,$total,'$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";
$res2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
if($res2==TRUE){
    $_SESSION['order']="<div class='success'>Food ordered Successfuly.</div>";
    header("location:".SITEURL);
}
else
{
    $_SESSION['order']="<div class='error'>Failed to order food </div>";
    header("location:".SITEURL);

}
}
?>




        <div class="clearfix"></div>
    </div>

           <?php
include('partie-front/footer.php');
?>