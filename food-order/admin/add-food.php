<?php
include('partie/menu.php'); 
 ?>
 <div class="main-content">
     <div class="wrapper">
     <h1 class="title">add food</h1>
            <?php
            if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);//remove session msg
            }
            ?>
     <br><br>
     <form action="" method="POST" enctype="multipart/form-data">
     <table class="tbl-2">
     <tr>
					<td>title :</td>
					<td><input type="text" name="title" placeholder="  title of the food" ></td>
				</tr>
				<tr>
					<td>description :</td>
					<td><textarea name="description" id="" cols="30" rows="5" placeholder="description of the food"></textarea></td>
				</tr>
				<tr>
					<td>price:</td>
					<td><input type="number" name="price" ></td>
				</tr>
                <tr>
                    <td>Select Image</td>
                    <td> <input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                     <select name="category" >
                        <?php
                        $sql = "SELECT * FROM category WHERE active='Yes'";
                        $res= mysqli_query($conn,$sql);
                            $count =mysqli_num_rows($res);
                            if ($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id=$rows['id'];
                                $title=$rows['title'];
                            
                                 ?>
                                 <option value="<?php echo $id;?>"><?php echo $title; ?></option>
                            <?php
                            }

                        }
                            
                            else{
                                 ?>
                                    <option value="0">No Category Found</option>
                                <?php
                                 }
                         

                        ?>

                     </select>
                    </td>
                </tr>
                <tr>
                    <td>featured</td>
                    <td> 
                    <div class="inline">
                    <p>yes</p><input type="radio" name ="featured" value="Yes",>
                    <p>no</p><input type="radio" name ="featured"  value="No"></div>
                    </td>
                </tr>
                <tr>
                    <td>active</td>
                    
                    <td> 
                    <div class="inline">
                    <p>yes</p><input type="radio" name ="active" value="Yes">
                    <p>no</p><input type="radio" name ="active"  value="No"></div>
                    </td>
                </tr>
                <tr>
					<td colspan="2">
					<input type="submit" name="submit" value="Add Food" class="btn-secondary"></td>
				</tr>
				
     
     </table>

     </form>


     <?php
//from FORM to database
if(isset($_POST['submit'])){
//get data
    $title = $_POST['title'];
     $description = $_POST['description'];
      $price = $_POST['price'];
       $category = $_POST['category'];
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
    //get extension
    $ext = explode('.', $image_name);
    $file_ext=strtolower(end($ext));
    //rename image
    //create name
    $image_name="Food_".rand(0000,9999).".".$file_ext;
    $source_path =$_FILES['image']['tmp_name'];
    $detination_path= "../img/food/".$image_name;
    $upload = move_uploaded_file($source_path,$detination_path);
    if($upload==false){
        $_SESSION['upload'] ="<div class='error'>Failed to upload image</div>";
        header("location:".SITEURL.'admin/add-food.php');
        die();
        }
    }
}
else{
    $image_name="";
}
$sql2 = "INSERT INTO food (title,featured,active,image_name,description,price,category_id) VALUES ('$title','$featured','$active','$image_name','$description',$price,$category)";
$res2 = mysqli_query($conn,$sql2)or die(mysqli_error($conn));
if($res2 == TRUE){
    $_SESSION['add']="<div class='success'>Food Added Successfuly</div>";
    header("location:".SITEURL.'admin/manage-food.php');
}
else{
    $_SESSION['add']="<div class='error'>Failed to add Food</div>";
    header("location:".SITEURL.'admin/add-food.php');
}}


    ?>
     </div>
 </div>
 <?php
include('partie/footer.php');
?>