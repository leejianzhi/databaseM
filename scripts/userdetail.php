<html>
	<head>
		<title>
			UserProfile
		</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	
	<body>


<div class="jumbotron text-center">
  <h1>Event Reservation</h1>
  <p>For INFSCI 2710 Final Project</p>
</div>
<!-- Nav Bar -->

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">ReserveToday</a>
  
  <!-- Links -->
  <ul class="navbar-nav mx-auto">
    <li class="nav-item">
      <a class="nav-link" href="/index.html">Login / Signup</a>
    </li>
  </ul>
</nav>
		
		<?$id = $_GET['user_id'];?>
		<div class="container">
		<form name="Input" action="userdetail.php" method="POST">
			Name:<input type="text" name="Name" class="form-control"><br>
			Age: <input type="text" id="age" name="age" class="form-control"><br>
			Address:<input class="form-control" type="text" name="address"><br>
			Phone Number:<input class="form-control" type="text" name="phone_number"><br>
			Email:<input class="form-control" type="text" name="email"><br>
			Birthday:<input class="form-control" type="date" name="birthday"><br>
			Paypal Account:<input class="form-control" type="text" name="paypal_account"><br>
						</select><br>
			<input type="submit" value="submit">
		</form>		
		</div>
		<a href=chooseevent.php>Back to home</a>
		<?php
			$Name = $_POST["Name"];
			$Name = addslashes($Name);
			$age = $_POST["age"];
			$address = $_POST["address"];
			$phone_number = $_POST["phone_number"];
			$email = $_POST["email"];
			$birthday = $_POST["birthday"];
			$paypal_account = $_POST["paypal_account"];
			
			
			// Generate sql
			session_start();
			$id = $_GET['user_id'];
			echo "<p><font color=\"red\">Id is ".$id."</font></p>";
			
			$sql = "UPDATE userdetails 
			SET name ='".$Name."', age='".$age."',address='".$address."',phone_number='".$phone_number."',email= '".$email."',birthday= '".$birthday."', paypal_account='".$paypal_account."' WHERE user_id ='".$_SESSION["admin"] ."'";		
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
	<a href=chooseevent.php>Back to home</a>
	</body>
</html>