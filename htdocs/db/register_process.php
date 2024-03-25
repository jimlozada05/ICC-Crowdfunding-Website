<?php
	require("dbconnect.php");
	$sql = "SELECT user_id, username FROM user WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
	$result = $conn->query($sql) or die($conn->error);
	
	if ($result->num_rows < 1) {
		$sql = "INSERT INTO user(username, password, email) VALUES('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."')";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
			$_SESSION['user_id'] = $conn->insert_id;
			$_SESSION['username'] = $_POST['username'];
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else{
		echo "Username already exist";
	}	
	$conn->close();
?>