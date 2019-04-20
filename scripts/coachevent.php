<html>

	<head>

		<title>
			Welcome to INFSCI 2710
		</title>
	</head>
	<body>
		<a href=addevent.php>Add New</a>
		<?php
			session_start();
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
			
			// Run a sql
			$sql = "select * from eventinfo;";
			$result = $conn->query($sql);
			if ($result)
			{
				echo "<table border=1px>";
				echo "<tr>";
					echo "<td>";
					echo "";
					echo "</td>";
					echo "<td>";
					echo "";
					echo "</td>";
					echo "<td>";
					echo "<td>";
					echo "";
					echo "</td>";
					echo "Who is in this event";
					echo "</td>";
					echo "<td>";
					echo "id";
					echo "</td>";
					echo "<td>";
					echo "name";
					echo "</td>";
					echo "<td>";
					echo "time";
					echo "</td>";
					echo "<td>";
					echo "place";
					echo "</td>";
					echo "<td>";
					echo "coach1";
					echo "</td>";
					echo "<td>";
					echo "coach2";
					echo "</td>";
					echo "<td>";
					echo "detail";
					echo "</td>";
					echo "<td>";
					echo "up_limit";
					echo "</td>";
					echo "<td>";
					echo "current attend number";
					echo "</td>";
					echo "<td>";
					echo "is_open";
					echo "</td>";
				echo "</tr>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					$sqlj = "select * from  coach_event where coach_id='".$_SESSION["admin"] ."' and event_id='".$row['event_id']."'";
					$sql2 = "SELECT user.user_name FROM user_event JOIN (user) ON (user_event.user_id = user.user_id) where event_id = '".$row['event_id']."'";
					if(mysqli_num_rows($conn->query($sqlj))==0)
					{
						echo "<td>";
						echo "You are not in this event";
						echo "</td>";
					}
					else
					{
						echo "<td>";
						echo "You are in this event";
						echo "</td>";
					}
					echo "<td>";
					echo "<a href='c_dropevent.php?id=".$row['event_id']."'>drop</a>";
					echo "</td>";
					echo "<td>";
					echo "<a href='c_joinevent.php?id=".$row['event_id']."'>join</a>";
					echo "</td>";
					echo "<td>";
					$result0 = mysqli_query($conn,$sql2); 
					while($r = $result0->fetch_assoc())
					{
						foreach($r as $k=>$v)
						{
							echo "$v,";
						}
					} 
					echo "</td>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			$result->free();
						// Close connection
			mysqli_close($conn);
		?>
	</body>
</html>
