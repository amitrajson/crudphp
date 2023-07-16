<?php 

require_once("check.php");

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>home</title>
</head>
<body>
	<h1>Student List</h1>
	<hr>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Pin No</th>
				<th>Gender</th>
				<th>Photos</th>
				<th>Country</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			require_once("db.php");
			$sql = "select * from student";
			$result = mysqli_query($conn, $sql);

			//print_r($result);

			while($row = mysqli_fetch_array($result)){ ?>
				<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['pin']; ?></td>
				<td><?php echo $row['gender']; ?></td>
				<td><img src="img/<?php echo $row['img']; ?>" width=50px height=50px / ></td>
				<td><?php echo $row['country']; ?></td>		
				<td colspan="2"><a href="edit.php ? edit=<?php echo $row['id']; ?>">Edit</a> | <a href="delete.php?del=<?php echo $row['id']; ?>">Delete</a> </td>
			</tr>

		<?php	
	}
			 ?>


			


		</tbody>


	</table>
</body>
</html>