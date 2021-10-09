<?php
include('partie/menu.php');
?>
<!--main content starts-->
<div class="main-content">
	<div class="wrapper">
		<h1 class="title">Dash Board</h1>	
		<?php
		if(isset($_SESSION['login'])){
			echo $_SESSION['login'];
			unset($_SESSION['login']);//remove session msg
		}
		?>
		<?php
		$sql = "SELECT * FROM category";
		$res = mysqli_query($conn,$sql);
		$count =mysqli_num_rows($res);
		?>
		<div class="col-4 text-center">
			<h1><?php echo $count;?></h1>
			<br>
			Categories
		</div>
		<?php
		$sql1 = "SELECT * FROM food";
		$res1 = mysqli_query($conn,$sql1);
		$count1 =mysqli_num_rows($res1);
		?>
		<div class="col-4 text-center">
			<h1><?php echo $count1;?></h1>
			<br>
			Foods
		</div>
		<?php
		$sql2 = "SELECT * FROM commande";
		$res2 = mysqli_query($conn,$sql2);
		$count2 =mysqli_num_rows($res2);
		?>
		<div class="col-4 text-center">
			<h1><?php echo $count2 ;?></h1>
			<br>
			Total Orders
		</div>
		<?php
		$sql3 = "SELECT SUM(total) AS Total FROM commande WHERE status='Dilevred'";
		$res3 = mysqli_query($conn,$sql3);
		$row3 =mysqli_fetch_assoc($res3);
		$total_r =$row3['Total'];
		?>
		<div class="col-4 text-center">
			<h1><?php echo $total_r ;?> DT</h1>
			<br>
			Revenue Generated
		</div>
<div class="clearfix"></div>


	</div>
</div>
<!--main content ends-->
<?php
include('partie/footer.php');
?>




