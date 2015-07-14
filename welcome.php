<?php
	session_start();
	include ("databaseConnection.php");
?>
<html>
	<head>
		<title>Welcome Page</title>
	</head>
	<body>
	<?php
		$sessionValue = $_SESSION["facultyid"];
		$result =  $con->query("SELECT FIRSTNAME FROM FACULTY_LOGIN WHERE FACULTYID LIKE ('$sessionValue')");

		if ($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				if ($result)
					echo "Welcome <b>".$row['FIRSTNAME']."</b>";
			}
		}
		//$con->close();
		//session_destroy();
	?>
	<form method="post" action="AddNotification.php" enctype="multipart/form-data">
		<table border="0" style ="width:55%;" align="center">
			<tr>
				<td>
					<input type="text" name="subjectTitle" placeholder="Title..." style="width: 50%;">
					<select name="subject" id="subject" value="subject">
						<option name="C++" id="C++" value="C++">C++</option>
						<option name="WDM" id="WDM" value="WDM">Web Data Management</option>
						<option name="C#" id="C#" value="C#">C#</option>
						<option name="JAVA" id="JAVA" value="JAVA">Java</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<textarea rows="20" cols="100%" name="subjectDescription" placeholder="Description"></textarea>
				</td>
			</tr>
			<tr>
				<td><label>File : </label><input type="file" name="upload[]" multiple placeholder="Choose File" /></td>
			</tr>
			<tr>
				<td align="right">
					<input type="reset" value="Clear" /> <input type="submit" value="Post" />
				</td>
			</tr>
		</table>
	</form>
	</body>
</html>
