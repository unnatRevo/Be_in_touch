<?php
	session_start();
	include("databaseConnection.php");

	$sessionValue = $_SESSION["username"];
	$title = $_POST["subjectTitle"];
	$description = $_POST["subjectDescription"];
	//$subjectName = "";
	
	$sql = $con->query("SELECT SUBJECT FROM SIGNUP WHERE FACULTYID LIKE ('$_SESSION['username']')";
	if($sql->num_rows > 0){
		while($row = $sql->fetch_assoc()){
			if ($row['FACULTYID'] === $_SESSION['username']){
				$subjectName = $row['SUBJECT'];
			}
		}
	}

	for($i=0; $i<count($_FILES['upload']['name']); $i++) {
  		$tmpFilePath = $_FILES['upload']['tmp_name'][$i];

  		$filename = array($_FILES['upload']['name']);
  		$filesize = array($_FILES['upload']['size']);
  		$filetype = array($_FILES['upload']['type']);
  		

		if ($tmpFilePath != ""){
    		$newFilePath = "./filedata/" . $_FILES['upload']['name'][$i];

	    	if(move_uploaded_file($tmpFilePath, $newFilePath)) {
	       		echo "file uplpoad.";
	        	header("Location:welcome.php",true);
	    	}
  		}
	}
	
	$statement = $con->prepare ("INSERT INTO UPLOAD VALUES (?, ?, ?,?)");
	$statement->bind_param("ssss",$sessionValue, $title, $description, $subjectName);
	$statement->execute();
	echo "<script> alert('data added'); </script>";
	header("Location:welcome.php");
?>
