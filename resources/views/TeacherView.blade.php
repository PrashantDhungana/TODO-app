<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Teachers Details</title>
</head>
<body>
	<table border="1px solid black">
		<caption>Teacher Details</caption>
		<th>ID</th>
		<th>Name</th>
		<th>Phone Number</th>
		<th>Address</th>
		
			<?php
foreach ($details as $detail) 
	{
		?>
		<tr>
			<td><?php echo $detail->id?></td>
			<td><?php echo $detail->name?></td>
			<td><?php echo $detail->phone_no?></td>
			<td><?php echo $detail->address?></td>

		</tr>
		<?php
	}
	?>
	</table>
</body>
</html>