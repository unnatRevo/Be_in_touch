<?php
			$factid = $_POST['signupUserid'];
			$signupPassword = $_POST['signupPassword'];
			$firstname = $_POST['signupFirstname'];
			$lastname = $_POST['signupLastname'];
			$email = $_POST['signupEmail'];
			$phone = $_POST['signupContact'];
			$subject = $_POST['signupSubject'];

			include ("databaseConnection.php");
			
				$statement = $con->prepare("INSERT INTO SIGNUP VALUES (?,?,?,?,?,?,?) ");
				$statement->bind_param("sssssis",$factid,$signupPassword,$firstname,$lastname,$email,$phone,$subject);

				$addIntoLogin = $con->prepare ("INSERT INTO FACULTY_LOGIN VALUES (?,?,?)");
				$addIntoLogin->bind_param("sss", $factid, $signupPassword, $firstname);

				$statement->execute();
				$addIntoLogin->execute();
				// echo "Data added";
			header("Location:index.php");
?>
