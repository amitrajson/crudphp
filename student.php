<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Registration</title>
</head>
<body>

	<h1>Student Registration</h1>
	<hr>
	<form method="post" enctype="multipart/form-data">
		<fieldset style="width:25%">
			<legend>Student Registration</legend>
			Name:<input type="text" name="name"><br>
		Email:<input type="email" name="email"><br>
		Pin No: <input type="number" name="pin"><br>
		Gender:<input type="radio" name="gender" value="Male">Male
		       <input type="radio" name="gender" value="Female">Female<br>
		Image: <input type="file" name="img"><br>
		Country:<select name="country">
			<option value="">Select</option>
			<option value="ind">India</option>
			<option value="nepal">Nepal</option>
			<option value="bhutan">Bhutan</option>
			<option value="usa">U.S.A</option>
		        </select> <br> <br>
		<input type="submit" name="student" value="Student Register">
		</fieldset>
	</form>

<?php 

require_once("db.php");
 
if(isset($_POST['student'])){

$name = $_POST['name'];
$email = $_POST['email'];
$pin = $_POST['pin'];
$gender = $_POST['gender'];

//$file = $_FILES['img'];
// echo "<pre>";
// print_r($file);
// echo "</pre>";

$file_name= $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];
$type = $_FILES['img']['type'];
$size = $_FILES['img']['size'];

$country = $_POST['country'];

move_uploaded_file($tmp_name, "img/".$file_name);


if(!empty($name) && !empty($email) && !empty($pin) ){

$sql = "INSERT INTO `student`(`name`, `email`, `pin`, `gender`, `img`, `country`) VALUES ('$name','$email','$pin','$gender','$file_name','$country')";

$result = mysqli_query($conn, $sql);

 if($result){
 	echo "Student Registration successfully";
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