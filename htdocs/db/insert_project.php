<?php
	require("dbconnect.php");
	
	if(!empty($_FILES["image"]["name"])) { 
		// Get file info 
		$fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
		
		// Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowTypes)){ 
			$image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image));
			
			// Insert image content into database
			$intro = $conn-> real_escape_string($_POST['introduction']);
			$desc = $conn-> real_escape_string($_POST['description']);
			$sql = "INSERT INTO project(title, image, introduction, description, type, category, status, due_date, goal_fund, current_fund, created_by) VALUES('".$_POST['title']."', '".$imgContent."', \"".$intro."\", \"".$desc."\", '".$_POST['type']."', '".$_POST['category']."', 'Ongoing', '".$_POST['due_date']."', '".$_POST['goal_fund']."', '0', '".$_SESSION['user_id']."')";
			if ($conn->query($sql) === TRUE) {
				echo $conn->insert_id;
			}
			else{
				echo "Error: " . $sql . "<br>" . $conn->error;
				header("HTTP/1.0 404 Not Found");
			}
		}
	}
	
	$conn->close();
?>