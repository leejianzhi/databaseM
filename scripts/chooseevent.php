<html>

	<head>

		<title>
			User Page
		</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	</head>  
<form name="search" method="post" action="searchevent.php">   
Seach for: <input type="text" name="find" /> in    
<Select NAME="field">   
<Option VALUE="Coach">Coach</option>   
<Option VALUE="name">Name</option>   
</Select>   
<input type="hidden" name="searching" value="yes" />   
<input type="submit" name="search" value="Search" />   
</form>
	<body>
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
					$sql2 = "select * from  user_event where user_id='".$_SESSION["admin"] ."' and event_id='".$row['event_id']."'";
					if(mysqli_num_rows($conn->query($sql2))==0)
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
					echo "<a href='dropevent.php?id=".$row['event_id']."'>drop</a>";
					echo "</td>";
					echo "<td>";
					echo "<a href='joinevent.php?id=".$row['event_id']."'>join</a>";
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
