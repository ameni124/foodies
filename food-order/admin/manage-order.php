<?php
include('partie/menu.php');
?> 
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Manage Order</h1>
	<?php
		if(isset($_SESSION['update'])){
			echo $_SESSION['update'];
			unset($_SESSION['update']);
		}
		?>
<table class="tbl-full">
			<tr>
				<th>S.N</th>
				<th>Food</th>
				<th>Price</th>
				<th>Qty</th>
				<th>Total</th>
				<th>Order Date</th>
				<th>Status</th>
				<th>Customer Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Adress</th>
				<th>Actions</th>
			</tr>
				<?php
		$sql = "SELECT c.id,food_id,qty,total,order_date,status,customer_name,customer_contact,customer_email,customer_address ,title ,price FROM commande c ,food f WHERE f.id=c.food_id ORDER BY c.id DESC ";
		$res = mysqli_query($conn,$sql)or die(mysqli_error($conn));;
			$count =mysqli_num_rows($res);
			$sn=1;
			if ($count>0)
			{
				while($rows=mysqli_fetch_assoc($res))

				{
					$id=$rows['id'];
					$food=$rows['title'];
					$price=$rows['price'];
					$qty=$rows['qty'];
					$total=$rows['total'];
					$order_date=$rows['order_date'];
					$status=$rows['status'];
					$customer_name=$rows['customer_name'];
					$customer_contact=$rows['customer_contact'];
					$customer_email=$rows['customer_email'];
					$customer_address=$rows['customer_address'];

					?>
			<tr>
				<td><?php echo $sn++; ?></td>
				<td><?php echo $food; ?></td>
				<td><?php echo $price ?>&nbspDT</td>
				<td><?php echo $qty ?></td>
				<td><?php echo $total ?></td>
				<td><?php echo $order_date ?></td>

				<td>
					<?php
					if($status=="Ordered"){
					echo "<label><b>$status</b></label>";
				}
					if($status=="On Delivery"){
					echo "<label  style='color:orange;'>$status</label>";
				}
					if($status=="Dilevred"){
					echo "<label  style='color:green;'>$status</label>";
				}
					if($status=="Cancelled"){
					echo "<label style='color:red;'>$status</label>";
				}
				?>
					</td>
				<td><?php echo $customer_name ?></td>
				<td><?php echo $customer_contact?></td>
				<td><?php echo $customer_email; ?></td>
				<td><?php echo $customer_address; ?></td>
				<td>
					<a href="update-order.php?id=<?php echo $id;?>"class="btn-secondary">Update</a>
				</td>
			</tr>
			<?php				

			}	
			}
			else
			{
				echo "<tr><td colspan ='12' class='error'>Order not Available</td></tr>";
			}
		?>		
		</table>
	</div>
</div>



<?php
include('partie/footer.php');
?>