<html>

	<head>

		<title>
			Welcome to INFSCI 2710
		</title>
	</head>
	<body>
		<a href=addevent.php>Add New</a>
		<a href=viewall.php>View all students</a>
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
			// Run a sql
			$sql = "select * from eventinfo;";
			$result = $conn->query($sql);
			if ($result)
			{
				echo "<table border=1px>";
				echo "<tr>";
					echo "<td>";
					echo "Who is in this event";
					echo "</td>";
					echo "<td>";
					echo "Which coach is ready for this event";
					echo "</td>";
					echo "<td>";
					echo "";
					echo "</td>";
					echo "<td>";
					echo "";
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
					echo "Volunteer1";
					echo "</td>";
					echo "<td>";
					echo "Volunteer2";
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
					$sql2 = "SELECT user.user_name FROM user_event JOIN (user) ON (user_event.user_id = user.user_id) where event_id = '".$row['event_id']."'";
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
					$sql3 = "SELECT coach.name FROM coach_event JOIN (coach) ON (coach_event.coach_id = coach.coach_id) where event_id = '".$row['event_id']."'";
					echo "<td>";
					$result1 = mysqli_query($conn,$sql3); 
					while($r1 = $result1->fetch_assoc())
					{
						foreach($r1 as $k1=>$v1)
						{
							echo "$v1,";
						}
					} 
					echo "</td>";
					echo "<td>";
					echo "<a href='updateevent.php?id=".$row['event_id']."'>update</a>";
					echo "</td>";
					echo "<td>";
					echo "<a href='deleteevent.php?id=".$row['event_id']."'>delete</a>";
					echo "</td>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			echo "<table border=1px>";
			$sqla3="SELECT user.user_name,coach.name FROM user_event JOIN user ON user_event.user_id = user.user_id join coach_event on coach_event.event_id = user_event.event_id JOIN coach on coach.coach_id = coach_event.coach_id order by user_name";
			$result = $conn->query($sqla3);
								echo "<tr>";
					echo "<td>";
					echo "user";
					echo "</td>";
					echo "<td>";
					echo "coach";
					echo "</td>";
					echo "</tr>";
			if ($result)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
			}
			echo "</table>";
			echo "<table border=1px>";
			$sqla4="SELECT COUNT(user.user_name) as mantime,eventinfo.name FROM user_event JOIN user ON user_event.user_id = user.user_id join eventinfo on EVENTinfo.event_id = user_event.event_id group by eventinfo.name ORDER BY mantime DESC";
			$result = $conn->query($sqla4);
					echo "<tr>";
					echo "<td>";
					echo "man_time";
					echo "</td>";
					echo "<td>";
					echo "event_name";
					echo "</td>";
					echo "</tr>";
			if ($result)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
			}
			echo "</table>";
			echo "<table border=1px>";
			$sqla5="SELECT COUNT(user.user_name) as mantime,CONCAT(YEAR(eventinfo.time),'-',MONTH(eventinfo.time)) AS Month FROM user_event JOIN user ON user_event.user_id = user.user_id join eventinfo on EVENTinfo.event_id = user_event.event_id GROUP by month ORDER BY mantime DESC";
			$result = $conn->query($sqla5);
					echo "<tr>";
					echo "<td>";
					echo "man_time";
					echo "</td>";
					echo "<td>";
					echo "month";
					echo "</td>";
					echo "</tr>";
			if ($result)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
			}
			echo "</table>";
			$result->free();
						// Close connection
			mysqli_close($conn);
		?>
	</body>
</html>
