<?php
	require("dbconnect.php");
	$sql = "SELECT user_id, username FROM user WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
	$result = $conn->query($sql) or die($conn->error);
	
	if ($result->num_rows < 1) {
		echo "Username and Password do not match";
	}
	else{
		$row = $result->fetch_assoc();
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['username'] = $row['username'];
	}
	$conn->close();
?>