<html>

	<head>

		<title>
			Welcome to INFSCI 2710
		</title>
	</head>
	<body>
		<a href=addevent.php>Add New</a>
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
			$sql = "select * from user left join userdetails on user.user_id = userdetails.user_id ;";
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
					echo "id";
					echo "</td>";
					echo "<td>";
					echo "name";
					echo "</td>";
					echo "<td>";
					echo "password";
					echo "</td>";
					echo "<td>";
					echo "Is_blocked";
					echo "</td>";
					echo "<td>";
					echo "id";
					echo "</td>";
					echo "<td>";
					echo "name";
					echo "</td>";
					echo "<td>";
					echo "age";
					echo "</td>";
					echo "<td>";
					echo "sex";
					echo "</td>";
					echo "<td>";
					echo "adress";
					echo "</td>";
					echo "<td>";
					echo "phone number";
					echo "</td>";
					echo "<td>";
					echo "email";
					echo "</td>";
					echo "<td>";
					echo "parents contect";
					echo "</td>";
					echo "<td>";
					echo "birthday";
					echo "</td>";
					echo "<td>";
					echo "paypal account";
					echo "</td>";
				echo "</tr>";
				while($row = $result->fetch_assoc())
				{
					echo "<tr>";
					echo "<td>";
					echo "<a href=Block.php?id=".$row['user_name'].">Block User</a><br>";
					echo "<a href=Unblock.php?id=".$row['user_name'].">Unblock User</a>";
					echo "</td>";
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
