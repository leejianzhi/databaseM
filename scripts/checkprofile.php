<html>

	<head>

		<title>
			User Profile
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
		
			<form action="userdetail.php?id=<?=$id?>" method="post">
    			
    			<button atype="submit" class="btn btn-primary pull-right">Update MyProfile</button>
		
			</form>
		    
		


<?php

			session_start();
			$Name = $_POST["name"];
			$Name = addslashes($Name);
			$Age = $_POST["age"];
			$Gender = $_POST["gender"];
			$Address = $_POST["address"];
			$phone_number = $_POST["phone_number"];
			$email = $_POST["email"];
			$birthday = $_POST["birthday"];
			$paypal_account = $_POST["paypal_account"];


			session_start();
			$id = $_GET['user_id'];
			echo "<p><font color=\"red\">Id is ".$id."</font></p>";
			
			$sql = "SELECT * from userdetails where user_id='".$_SESSION["admin"] ."'";

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
				echo "New Profile created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}

			$result = $conn->query($sql);
				if($result -> num_rows > 0){

				while($row = $result -> fetch_assoc()){

					echo "Name: " .$row["name"]."<br>"."Age: ".$row["age"]."<br>"."Gender: ".$row["gender"]."<br>". "Address: ".$row["address"]."<br>"."Phone Number".$row["phone_number"]."<br>". "Email: ".$row["email"]."<br>"."Birthday: ".$row["birthday"]."<br>"."Paypal Account: ".$row["paypal_account"]."<br>";
				}
			}else{

				echo "No results found";
			}
			$result->free(); 
			
			// Close connection
			mysqli_close($conn);

?>




	</body>
</html>
