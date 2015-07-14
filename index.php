<html>
	<head>
		<title>Welcome to blog</title>
	</head>
	<body>
		<h3>
		<center>
			Welcome to blog!
		</center></h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<table border="0" style="position: absolute; left: 150px; top: 50px;">
				<tr>
					<td>
					<input type="text" name="userid" placeholder="Username" autofocus required />
					</td>
				</tr>
				<tr>
					<td>
					<input type="password" name="password" placeholder="Password" required />
					</td>
				</tr>
				<tr>
					<td>
					<input type="submit" value="Login" name="button"/>
					<label id="userName" style="visibility:hidden;">Wrong username or password</label></td>
				</tr>
			</table>
		</form>

		<?php
		session_start();

		$_SESSION['facultyid'] = $username = $_POST['userid'];
		$password = $_POST['password'];

		include ("databaseConnection.php");

		$result = $con -> query("SELECT FACULTYID, PASSWORD, FIRSTNAME FROM FACULTY_LOGIN WHERE FACULTYID like ('$username')");
		if ($result -> num_rows > 0) {
			while ($row = $result -> fetch_assoc()) {
				$usercode = $row["FACULTYID"];
				$passcode = $row["PASSWORD"];

				if ($username === $usercode && $password === $passcode) {
					header("Location:welcome.php");
				}
			}
		}
		?>

		<form action="signupBack.php" method="POST">
			<table border="0" id="signupTable" style="visibility: visible;
			position: absolute; right: 300px; top:50px;" align="right">
				<tr>
					<td>
					<input type="text" name="signupUserid" id="signupUserid" placeholder="Username" required />
					</td>
				</tr>
				<tr>
					<td>
					<input type="password" name="signupPassword" id="signupPassword" placeholder="Password" required/>
					</td>
				</tr>
				<tr>
					<td>
					<input type="password" name="signupConfirmPassword"
					id="signupConfirmPassword" onblur="checkPassword()" placeholder="Confirm Password" required/>
					<label for="errorMessage" style="visibility:hidden; color:red;" id="errorMsg"> Password is not matching. </label></td>
				</tr>
				<tr>
					<td>
					<input type="text" onfocus="checkPassword()" name="signupFirstname" id="signupFirstname" placeholder="First name" required />
					</td>
				</tr>
				<script>
					function checkPassword() {
						var pass1 = document.getElementById("signupPassword").value;
						var pass1 = document.getElementById("signupConfirmPassword").value;
		
						if (pass1 == pass2) {
							//
						} else {
							//document.getElementById("errorMsg").style.visibility = "visible";
							alert("Password doen't match");	
						}
					}
		</script>
				<tr>
					<td>
					<input type="text" name="signupLastname" id="signupLastname" placeholder="Last name" required />
					</td>
				</tr>
				<tr>
					<td>
					<input type="email" name="signupEmail" id="signupEmail" placeholder="Email" required/>
					</td>
				</tr>
				<tr>
					<td>
					<input type="text" name="signupContact" id="signupContact" placeholder="Contact Number" required= />
					</td>
				</tr>
				<tr>
					<td>
					<input type="subject" name="signupSubject" id="signupSubject" placeholder="Subject" required= />
					</td>
				</tr>
				<tr>
					<td>
					<input type="submit" name="button" id="signup" value="Sign up" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>

