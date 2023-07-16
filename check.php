<?php 

session_start();

if(isset($_SESSION['id']) && $_SESSION['loginType'] == "admin" ){

}else{
	echo header("location:login.php");
}

 ?>