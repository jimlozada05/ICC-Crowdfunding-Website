<?php

	function getRecommendedRecord(string $type, string $status, int $page){
		require("dbconnect.php");
		$sql = "SELECT *
				FROM (
					SELECT *, `current_fund`/`goal_fund` * 100 AS percent
					FROM project
					WHERE `category` = 'Causes and Community'
					ORDER BY `current_fund`/`goal_fund` * 100 DESC
				) AS recommended_cause
				UNION
				SELECT *
				FROM (
					SELECT *, `current_fund`/`goal_fund` * 100 AS percent
					FROM project
					WHERE NOT `category` = 'Causes and Community'
					ORDER BY `current_fund`/`goal_fund` * 100 DESC
				) AS recommended_project
				LIMIT 9 OFFSET ".($page -1) * 9;
		$result = $conn->query($sql) or die($conn->error);
		
		$conn->close();
		return $result;
	}
	
	function getCategoryRecord(string $type, string $category, string $status, int $page){
		require("dbconnect.php");
		if($type == "Both" && $status == "Both"){
			$sql = "SELECT *, `current_fund`/`goal_fund` * 100 AS percent
					FROM project
					WHERE `category` = '".$category."'
					LIMIT 9 OFFSET ".($page -1) * 9;
		}
		else if($status == "Both"){
			$sql = "SELECT *, `current_fund`/`goal_fund` * 100 AS percent
					FROM project
					WHERE `type` = '".$type."' AND `category` = '".$category."'
					LIMIT 9 OFFSET ".($page -1) * 9;
		}
		else if($type == "Both"){
			$sql = "SELECT *, `current_fund`/`goal_fund` * 100 AS percent
					FROM project
					WHERE `category` = '".$category."' AND `status` = '".$status."'
					LIMIT 9 OFFSET ".($page -1) * 9;
		}else{
			$sql = "SELECT *, `current_fund`/`goal_fund` * 100 AS percent
					FROM project
					WHERE `type` = '".$type."' AND `category` = '".$category."' AND `status` = '".$status."'
					LIMIT 9 OFFSET ".($page -1) * 9;
		}
		$result = $conn->query($sql) or die($conn->error);
		
		$conn->close();
		return $result;
	}
	
	function getPaggingCount(string $type, string $category, string $status){
		require("dbconnect.php");
		if($category == "Recommended"){
			$sql = "SELECT CEILING(COUNT('project_id')/9) AS num_page FROM project";
			$result = $conn->query($sql) or die($conn->error);	
		}
		else{
			if($type == "Both" && $status == "Both"){
				$sql = "SELECT CEILING(COUNT('project_id')/9) AS num_page FROM project
				WHERE `category` = '".$category."'";
			}
			else if($status == "Both"){
				$sql = "SELECT CEILING(COUNT('project_id')/9) AS num_page FROM project
				WHERE `type` = '".$type."' AND `category` = '".$category."'";
			}
			else if($type == "Both"){
				$sql = "SELECT CEILING(COUNT('project_id')/9) AS num_page FROM project
				WHERE `category` = '".$category."' AND `status` = '".$status."'";
			}
			else{
				$sql = "SELECT CEILING(COUNT('project_id')/9) AS num_page FROM project
				WHERE `type` = '".$type."' AND `category` = '".$category."' AND `status` = '".$status."'";
			}
				
			$result = $conn->query($sql) or die($conn->error);
		}
		$conn->close();
		return $result;
	}
?>