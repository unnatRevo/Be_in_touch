<html>
	<head>
		<title>Welcome to blog</title>
	</head>
	<body>
		<h3>Welcome to blog!</h3>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<table border="0" style="position: absolute; left: 150px; top: 50px;">
				<tr>
					<td>
					<input type="text" name="textUsername" placeholder="Username" autofocus required />
					</td>
				</tr>
				<tr>
					<td>
					<input type="password" name="textPassword" placeholder="Password" required />
					</td>
				</tr>
				<tr>
					<td>
					<input type="submit" value="Login" name="button"/>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<!-- <input type="hidden" name="submitAction" id="submitAction" value="signup" /> -->
						<input type="submit" value="Signup" name="button"/>
						<label id="userName" style="visibility:hidden;">Wrong username or password</label>
					</form></td>
				</tr>
			</table>
		</form>

		
		<form action="signupBack.php" method="POST">
			<table border="0" id="signupTable" style="visibility: visible; 
			position: absolute; right: 300px; top:50px;" align="right">
				<tr>
					<td>
					<input type="hidden" name="signupDetail" id="signupDetail" value="signupDetails" />
					<input type="text" name="factId" id="factId" placeholder="Username" required />
					</td>
				</tr>
				<tr>
					<td>
					<input type="password" name="signupPassword" id="signupPassword" placeholder="Password" required/>
					</td>
				</tr>
				<tr>
					<td> <input type="password" name="signupConfirmPassword"
					id="signupConfirmPassword" onblur="checkPassword()" placeholder="Confirm Password" required"/>
					<label for="errorMessage" style="visibility:hidden; color:red;" id="errorMsg">
					Password is not matching.
					</label>
					</td>
					</tr>
					<tr>
					<td><input type="text" name="signupFirstname" id="signupFirstName" placeholder="First name" required /></td>
					</tr>
					<tr>
					<td><input type="text" name="signupLastname" id="signupLastName" placeholder="Last name" required /></td>
					</tr>
					<tr>
					<td><input type="email" name="signupEmail" id="signupEmail" placeholder="Email" required/></td>
					</tr>
					<tr>
					<td><input type="text" name="contactNo" id="contctNo" placeholder="Contact Number" required= /></td>
				</tr>
				<tr>
					<td>
					<input type="subject" name="subject" id="subject" placeholder="Subject" required= />
					</td>
				</tr>
				<tr>
					<td>
					<input type="submit" name="button" id="signup" value="Sign up" />
					</td>
				</tr>
			</table>
		</form>
		<script>
			function checkPassword() {
				var pass1 = document.getElementById("signupPassword").value;
				var pass1 = document.getElementById("signupConfirmPassword").value;

				if ( pass1 != pass2 ) {
					document.getElementById("errorMsg").style.visibility = visible;
				}
			}
		</script>
	</body>
</html>

