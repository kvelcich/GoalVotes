<?php
	if(isset($_POST['action']) && !empty($_POST['action'])) {
		$action = $_POST['action'];
		$num = $_POST['num'];
		$id_1 = $_POST['id1'];
		$id_2 = $_POST['id2'];
		$rating_1 = $_POST['r1'];
		$rating_2 = $_POST['r2'];
		$won = $_POST['won'];
		switch($action) {
			case 'load': 
				load($num);
				break;
			case 'won':
				won($won, $id_1, $id_2, $rating_1, $rating_2);
				break;
		}
	}
	
	function load($num) {
		$connection = mysqli_connect("*****","*****","*****", "*****");
			if (!$connection) {
				die('Could not connect: ' . mysql_error());
			}
			
		$max = total();
		do {
			$new = rand(1, $max);
		} while ($new == $num);
		
		$sql = "select * from ***** where id='$new'";
		$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
	
		$temparray = array();
		while($row = mysqli_fetch_assoc($result)) {
			$temparray[] = $row;
		}
		
		echo json_encode($temparray);
	}
	
	function total() {
		$con = mysql_connect("*****","*****","*****");
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}

		mysql_select_db("*****", $con);

		$result = mysql_query("select count(1) FROM *****");
		$row = mysql_fetch_array($result);

		$total = $row[0];
		mysql_close($con);
		
		return $total;
	}

	function won($won, $id_1, $id_2, $rating_1, $rating_2) {
		$k = 256; //weight

		$q1 = pow(10, ($rating_1/400));
		$q2 = pow(10, ($rating_2/400));

		$e1 = ($q1/($q1 + $q2));
		$e2 = ($q2/($q1 + $q2));
		
		if($won == 1) {
			$new1 = $rating_1 + $k *(1 - $e1);
			$new2 = $rating_2 + $k *(0 - $e2);
		} else if ($won == 2) {
			$new1 = $rating_1 + $k *(0 - $e1);
			$new2 = $rating_2 + $k *(1 - $e2);
		}

		$conn = mysqli_connect("*****", "*****", "*****", "*****");

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$sql = "UPDATE ***** SET rating='$new1' WHERE id='$id_1'";
		if (mysqli_query($conn, $sql)) {
			//Record updated successfully
		} else {
			//Fail
		}      

		$sql = "UPDATE ***** SET rating='$new2' WHERE id='$id_2'";
		if (mysqli_query($conn, $sql)) {
			//Record updated successfully
		} else {
			//Fail
		}    
		mysql_close($conn);
	}
?>