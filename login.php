<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<h1>Login</h1>
	<hr>
	<form method="post">
		<fieldset style="width:20%">
			<legend>Login</legend>
			
		Email:<input type="email" name="email"><br>
		Password:<input type="password" name="pass"><br><br>
		<input type="submit" name="login" value="Login">
		</fieldset>
	</form>
<?php 

require_once("db.php");

session_start();
 
if(isset($_POST['login'])){

$email = $_POST['email'];
$pass = $_POST['pass'];

$_SESSION['email'] = $email;
$_SESSION['id'] = session_id();
$_SESSION['loginType'] = "admin";

if(!empty($email) && !empty($pass) ){

$sql = "SELECT `id`, `name`, `email`, `pass`, `created_at` FROM `reg` WHERE `email`='$email' and `pass` = '$pass' ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
 	echo header("location:index.php");
 }else{

 	echo "Failed";
 }

}else{
	echo "Please fill the all fields";
}




}

 ?>
</body>
</html>