<html>

	<head>

		<title>
			User Page
		</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>  

	<body>
		<!-- Header of the site -->

	<div class="jumbotron text-center">
  		<h1>Event Reservation</h1>
  		<p>For INFSCI 2710 Final Project</p>
	</div>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">ReserveToday</a>
  
  <!-- Links -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mx-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/index.html">Login / Signup</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/events.html">Events</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/coach.html">Coach</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/search.html">Search</a>
    </li>
  </ul>

  </div>
</nav>
	<form name="search" method="post" action="searchevent.php">   
		
		<div class="form-group">
		Seach for: <input type="text" name="find" /> in    
		<Select NAME="field">   
			<Option VALUE="Coach">Coach_Name</option>   
			<Option VALUE="name">Event_Name</option>   
		</Select>   
			<input type="hidden" name="searching" value="yes" />   
			<input type="submit" name="search" value="Search" />  
		</div> 
	</form>
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
