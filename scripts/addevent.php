<html>

	<head>

		<title>
			Welcome
		</title>
	</head>
	<body>
		<a href=selectevent.php>Back to home</a><br>
		Add new event:
		<form name="Input" action="addevent.php" method="POST">
			Name:<input type="text" name="Name"><br>
			Time:
				<input type="datetime-local" id="Time"
				name="Time" value="2018-06-12T19:30"
				><br>
			Location:<input type="text" name="Location"><br>
			Coach:<input type="text" name="Coach"><br>
			assistant_coach:<input type="text" name="assistant_coach"><br>
			detail:<input type="text" name="detail"><br>
			up_limit:<input type="text" name="up_limit"><br>
			is_open:<select type="text" name="is_open">
							  <option value=0>close</option>
							  <option value=1>open</option>
						</select><br>
			<input type="submit" value="submit">
		</form>
		<?php
			$Name = $_POST["Name"];
			$Name = addslashes($Name);
			$Time = date("Y-m-d h-i" ,strtotime(str_replace('.', '-', $_POST["Time"])  ));
			$Location = $_POST["Location"];
			$Coach = $_POST["Coach"];
			$assistant_coach = $_POST["assistant_coach"];
			$detail = $_POST["detail"];
			$up_limit = $_POST["up_limit"];
			$is_open = $_POST["is_open"];
			
			if ($Name == "" || $Location == ""|| $Coach == "")
			{
				die("Please provide input in fields.");
			}
			// Generate sql
			$sql = "INSERT INTO eventinfo (name, time, location, Coach,assistant_coach,detail,up_limit,is_open)
			VALUES ('".$Name."', '".$Time."','".$Location."','".$Coach."', '".$assistant_coach."', '".$detail."', '".$up_limit."', '".$is_open."')";
			echo "<p><font color=\"red\">".$sql."</font></p>";
			
			// Create connection
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$database = "finalProject";
			$conn = new mysqli($servername, $username, $password, $database);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			echo "<p><font color=\"red\">Connected successfully</font></p>";
         


			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}


					 
			
			// Close connection
			mysqli_close($conn);
		?>
	</body>
</html>