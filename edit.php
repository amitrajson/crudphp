<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Update</title>
</head>
<body>

	<h1>Student Update</h1>
	<hr>

<?php 
require_once("db.php");
$id = $_GET['edit'];

$sql = "select * from student where `id`='$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

// echo "<pre>";
// print_r($row);

 ?>

	<form method="post" enctype="multipart/form-data">
		<fieldset style="width:25%">
			<legend>Student Update</legend>
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
			Name:<input type="text" name="name" value="<?php echo $row['name'] ?>"><br>
		Email:<input type="email" name="email" value="<?php echo $row['email'] ?>"><br>
		Pin No: <input type="number" name="pin" value="<?php echo $row['pin'] ?>"><br>
		Gender:<input type="radio" name="gender" value="Male">Male
		       <input type="radio" name="gender" value="Female">Female<br>
		Image: <input type="file" name="img"><br>
		Country:<select name="country" >
			<option value="">Select</option>
			<option value="ind">India</option>
			<option value="nepal">Nepal</option>
			<option value="bhutan">Bhutan</option>
			<option value="usa">U.S.A</option>
		        </select> <br> <br>
		<input type="submit" name="edit" value="Student Update">
		</fieldset>
	</form>

<?php 


 
if(isset($_POST['edit'])){
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$pin = $_POST['pin'];
$gender = $_POST['gender'];

$file_name= $_FILES['img']['name'];
$tmp_name = $_FILES['img']['tmp_name'];
$type = $_FILES['img']['type'];
$size = $_FILES['img']['size'];

$country = $_POST['country'];

move_uploaded_file($tmp_name, "img/".$file_name);


if(!empty($name) && !empty($email) && !empty($pin) ){

$sql = "UPDATE `student` SET `name`='$name',`email`='$email',`pin`='$pin',`gender`='$gender',`img`='$file_name',`country`='$country' WHERE `id`= '$id' ";

$result = mysqli_query($conn, $sql);

 if($result){
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
</html>s