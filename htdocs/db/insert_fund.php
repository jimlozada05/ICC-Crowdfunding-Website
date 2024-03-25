<?php
	require("dbconnect.php");
	if(isset($_POST['amount'])){
		$sql = "INSERT INTO fund(amount, project_id, fund_by, fund_date) 
				VALUES('".$_POST['amount']."', '".$_POST['project_id']."', '".$_SESSION['user_id']."', CURDATE())";
		if ($conn->query($sql) === TRUE) {
			$sql = "SELECT current_fund FROM project WHERE project_id = ".$_POST['project_id'];
			$result = $conn->query($sql) or die($conn->error);
			$row = $result->fetch_assoc();
			$total = $row['current_fund'] + $_POST['amount'];
			$sql = "UPDATE project SET current_fund = '".$total."' WHERE project_id = ".$_POST['project_id'];
			if ($conn->query($sql) === TRUE) {
			}
			else{
				echo "Error: " . $sql . "<br>" . $conn->error;
				header("HTTP/1.0 404 Not Found");
			}
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
			header("HTTP/1.0 404 Not Found");
		}
	}
	
	
	$conn->close();
//header("HTTP/1.0 404 Not Found");
?>