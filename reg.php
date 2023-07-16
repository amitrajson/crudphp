<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<h1>Registration</h1>
	<hr>
	<form method="post">
		<fieldset style="width:20%">
			<legend>Registration</legend>
			Name:<input type="text" name="name"><br>
		Email:<input type="email" name="email"><br>
		Password:<input type="password" name="pass"><br><br>
		<input type="submit" name="reg" value="Registration">s
		</fieldset>
	</form>

<?php 

require_once("db.php");
 
if(isset($_POST['reg'])){

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

if(!empty($name) && !empty($email) && !empty($pass) ){

$sql = "INSERT INTO `reg`( `name`, `email`, `pass`) VALUES ('$name','$email','$pass')";

$result = mysqli_query($conn, $sql);

 if($result){
 	echo "Registration successfully";
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