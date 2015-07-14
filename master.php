<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>Welcome to blog</center>

<table border="0">
	<tr>
		<td>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table border="0" style="position : absolute; left:250px; top:30px;">
			<tr>
			<td>
				<input type="text" name="userid" id="userid" placeholder="Username" autofocus required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="password" name="password" id="password" placeholder="Password" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="Submit" name="button" id="" value="Login" autofocus required />
			</td>
			</tr>
		</table>
	</form>
		</td>
		
		<td>
			<form action="signupBack.php" method="post">
		<table border="0" style="position : absolute; right:250px; top:30px;">
			<tr>
			<td>
				<input type="text" name="signupUserid" id="signupUserid" value="" placeholder="Username" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="password" name="signupPassword" id="signupPassword" value="" placeholder="Password" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="password" name="signupConfirmPassword" id="signupConfirmPassword" value="" placeholder="Confirm Password" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="text" name="signupFirstname" id="signupFirstname" value="" placeholder="First name" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="text" name="signupLastname" id="signupLastname" value="" placeholder="Last name" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="email" name="signupEmail" id="signupLastname" value="" placeholder="Email" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="text" name="signupContact" id="signupContact" value="" placeholder="Contact number" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="text" name="signupSubject" id="signupSubject" value="" placeholder="Subject" required />
			</td>
			</tr>
			<tr>
			<td>
				<input type="submit" name="button" id="" value="Signup" />
			</td>
			</tr>
			
		</table>
	</form>	
		</td>
	</tr>
</table>
<?php
		include ("databaseConnection.php");
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			// echo "in if, before 2nd if<br>";
			echo "<script>alert('good moring');</script>";
			$username = $_POST['userid'];
			$password = $_POST['password'];
			session_start();
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			// echo "session started<br>";

			$result = $con -> query("SELECT USERNAME, PASSWORD, FIRSTNAME FROM FACUTLY_LOGIN");
			if ($result -> num_rows > 0) {
				while ($row = $result -> fetch_assoc()) {
					$usercode = $row["USERNAME"];
					$passcode = $row["PASSWORD"];

					if ($username === $usercode && $password === $passcode) {
						header("Location:welcome.php");
					} else {
						echo "<script> document.getElementById('userName').style.visibility='visible'; </script>";
					}
				}
			}
			die();
		} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
			echo "<script>docuement.getElementById('signUpTable').style.visibility='visible';</script>";
		}
		?>
</body>
</html>