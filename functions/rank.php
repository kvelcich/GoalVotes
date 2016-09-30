<?php 
	$counter = 1;
	$space = ". ";
	$conn = mysqli_connect("*****", "*****", "*****", "*****");

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT name, rating, about FROM goals ORDER BY rating DESC";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $counter + "" .  $space . $row["name"]. " - " . $row["about"]. " - " . $row["rating"]. "<br>";
			$counter++;
		}
	} else {
		echo "0 results";
	}
	$conn->close();
?>
