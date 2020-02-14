<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Parents Details</title>
</head>
<body>
	<?php
	if (isset($details))
	 {
		echo "No details Found";
	}
	else{
	foreach ($details as $detail) 
	{
		echo $detail->id."<br>";
		echo $detail->name."<br>";
		echo $detail->phone_no."<br>";
		echo $detail->address."<br>";
		echo "<br>";

	}
}
	?>
</body>
</html>