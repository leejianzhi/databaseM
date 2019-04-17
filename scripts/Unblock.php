<html>
	<head>
		<title>
			Welcome
		</title>
	</head>
	<body>
		<?php
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
			
			// sql to delete a record
			$id = $_GET['id'];
			echo "<p><font color=\"red\">Id is ".$id."</font></p>";
			$sql = "UPDATE user set block = 0 where user_name='".$id."'";						
			echo "<p><font color=\"red\">".$sql."</font></p>";
			if ($conn->query($sql) === TRUE) {
				echo "Unblock successfully";
			} else {
				echo "Error" . $conn->error;
			}

			$conn->close();
			echo '<a href="viewall.php">Back</a>';
		?>
	</body>
</html>