<?php
include('../config/connect.php');
//1-get the id pf admin to be deleted
$id =$_GET['id'];
//2-create sql query to delete admin
$sql= "DELETE FROM admin WHERE id=$id";
$res= mysqli_query($conn,$sql);
if ($res==TRUE){
	$_SESSION['delete']="<div class='success'> Admin deleted Successfuly </div>";
	header("location:".SITEURL.'admin/manage-admin.php');
}
else{
	$_SESSION['delete']="<div class='error'> Failed to delete admin </div>";
	header("location:".SITEURL.'admin/manage-admin.php');}
//3-go to manage admin with msg success/error

?>