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
			$id = $_GET['id'];
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			echo "<p><font color=\"red\">Connected successfully</font></p>";
			session_start();
				$sql_get_block = "select block from  user where user_id='".$_SESSION["admin"] ."'";
				$result = $conn->query($sql_get_block);
				$row = mysqli_fetch_array($result);
				if(($row['block'] )==true)
				{
					$conn->close();
					echo"<script charset=UTF-8>alert('Your account is blocked');window.location.href='chooseevent.php'</script>";
				}

				$sql_get_open_flag = "select is_open from  eventinfo where event_id='".$id."'";
				$result = $conn->query($sql_get_open_flag);
				$row = mysqli_fetch_array($result);
				if(($row['is_open'] )==false)
				{
					$conn->close();
					echo"<script charset=UTF-8>alert('Event closed');window.location.href='chooseevent.php'</script>";
				}


				$sql_get_current = "select current_attender from eventinfo where event_id='".$id."'";
				$sql_get_limit = "select up_limit from eventinfo where event_id='".$id."'";
				$current = mysqli_fetch_array($conn->query($sql_get_current));
				$limit = mysqli_fetch_array($conn->query($sql_get_limit));
				if($current['current_attender']>=$limit['up_limit'] )
				{
					$conn->close();
					echo"<script charset=UTF-8>alert('Event full');window.location.href='chooseevent.php'</script>";
				}




				$sql = "select * from  user_event where user_id='".$_SESSION["admin"] ."' and event_id='".$id."'";
									echo "<p><font color=\"red\">".$sql."</font></p>";
				if(mysqli_num_rows($conn->query($sql))>=1)
				{
					$conn->close();
					echo"<script charset=UTF-8>alert('you already in this event');window.location.href='chooseevent.php'</script>";
				}
				else
				{
					// sql to a record
					echo "<p><font color=\"red\">Id is ".$id."</font></p>";
					$sql = "INSERT INTO user_event (user_id, event_id)
					VALUES ('".$_SESSION["admin"] ."', '".$id."')";
					echo "<p><font color=\"red\">".$sql."</font></p>";
					
					$sql2 = "UPDATE eventinfo set current_attender = current_attender + 1 where event_id='".$id."'";
					echo "<p><font color=\"red\">".$sql."</font></p>";
										
					if ($conn->query($sql) === TRUE AND $conn->query($sql2) === TRUE) {
						echo "join event successfully";
					} else {
						echo "Error: " . $conn->error;
					}

					$conn->close();
				}
					echo '<a href="chooseevent.php">Back</a>';
				
		?>
	</body>
</html>