<?php 
require_once("db.php");

$id = $_GET['del'];

$sql = " delete from student where `id`= '$id' ";
$result = mysqli_query($conn,$sql);

if($result){
	echo header("location:index.php");
}else{
	echo header("location:index.php");
}


 ?>