	<?php
include('partie/menu.php');
?>
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Update Order</h1>
	<?php
		if (isset($_GET ['id'])){
			//get the id
		$id =$_GET['id'];
			//sql query to get details
		$sql = "SELECT c.id,food_id,qty,status,customer_name,customer_contact,customer_email,customer_address ,title ,price FROM commande c ,food f WHERE f.id=c.food_id AND c.id=$id";	
			//execute queryu
		$res= mysqli_query($conn,$sql) or die(mysqli_error($conn)) ;

			$count =mysqli_num_rows($res);
			if ($count==1){
				//get the details 
				$rows=mysqli_fetch_assoc($res);
					$id=$rows['id'];
					$food=$rows['title'];
					$price=$rows['price'];
					$qty=$rows['qty'];
					$status=$rows['status'];
					$customer_name=$rows['customer_name'];
					$customer_contact=$rows['customer_contact'];
					$customer_email=$rows['customer_email'];
					$customer_address=$rows['customer_address'];
			}
			else{
				echo "<tr><td colspan ='12' class='error'>Orde not Available</td></tr>";
				}
				}

			else{
				
				echo "<tr><td colspan ='12' class='error'>Order not Available</td></tr>";
			

		}

		?>

		<form action="" method="POST">
			<table class="tbl-2">
				<tr>
					<td>Food Name :</td>
					<td><b><?php echo $food; ?></b></td>
				</tr>
				<tr>
					<td>Qty :</td>
					<td><input type="number" name="qty" value="<?php echo $qty; ?>" placeholder="  Enter your username" required></td>
				</tr>
				<tr>
					<td>Price:</td>
					<td><b><?php echo $price; ?>&nbspDT</b></td>
				</tr>
				<tr>
					<td> Status</td>
					<td> 
							<select name="status">
									<option <?php if($status == "Ordered"){echo "selected";} ?>value="Ordered">Ordered</option>
									<option <?php if($status == "On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
									<option <?php if($status == "Dilevred"){echo "selected";} ?> value="Dilevred">Dilevred</option>
									<option <?php if($status == "Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>

							</select>

					</td>
				</tr>
				<tr>
					<td>Customer Name :</td>
					<td><input type="text" name="customer_name" value="<?php echo $customer_name; ?>"></td>
				</tr>
				<tr>
					<td>Customer Contact :</td>
					<td><input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"></td>
				</tr>
				<tr>
					<td>Customer Email :</td>
					<td><input type="text" name="customer_email" value="<?php echo $customer_email; ?>"></td>
				</tr>
				<tr>
					<td>Customer Adress :</td>
					<td><textarea name="customer_address" cols="30" rows="5" ><?php echo $customer_address;?> </textarea></td>
				</tr>
				<tr>
					<td colspan="2">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="price" value="<?php echo $price; ?>">
					<input type="submit" name="submit" value="Update Order" class="btn-secondary"></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php
//from FORM to database
if(isset($_POST['submit'])){
//get data
					$id=$_POST['id'];
					$price=$_POST['price'];
					$qty=$_POST['qty'];
					$total =$price * $qty;
					$status=$_POST['status'];
					$customer_name=$_POST['customer_name'];
					$customer_contact=$_POST['customer_contact'];
					$customer_email=$_POST['customer_email'];
					$customer_address=$_POST['customer_address'];
//save data into base
$sql2 = "UPDATE commande SET 
qty=$qty,
total =$total,
status='$status',
customer_name='$customer_name',
customer_contact='$customer_contact',
customer_email='$customer_email',
customer_address='$customer_address'
WHERE id=$id
";
echo $sql2;
//execute query
$res2 = mysqli_query($conn,$sql2)or die(mysqli_error($conn)) ;
if($res2==TRUE){
	$_SESSION['update']="<div class='success'>Order Updated Successfuly.</div>";
	header("location:".SITEURL.'admin/manage-order.php');
}
else
{
	$_SESSION['update']="<div class='error'>Failed to Update order.</div>";
	header("location:".SITEURL.'admin/manage-order.php');

}}
?>
<?php
include('partie/footer.php');
?>