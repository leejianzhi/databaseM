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
			$sql = "DELETE FROM eventinfo WHERE event_id =".$id;						
			echo "<p><font color=\"red\">".$sql."</font></p>";
			if ($conn->query($sql) === TRUE) {
				echo "Record deleted successfully";
			} else {
				echo "Error deleting record: " . $conn->error;
			}

			$conn->close();
			echo '<a href="selectevent.php">Back</a>';
		?>
	</body>
</html>