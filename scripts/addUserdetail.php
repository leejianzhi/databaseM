<?php
			$Name = $_POST["name"];
			$Name = addslashes($Name);
			$Age = $_POST["age"];
			$Gender = $_POST["gender"];
			$Address = $_POST["address"];
			$phone_number = $_POST["phone_number"];
			$email = $_POST["email"];
			$parent_phone = $_POST["parent_phone"];
			$birthday = $_POST["birthday"];
			$paypal_account = $_POST["paypal_account"];
			
			
			// Generate sql
			
			
			session_start();
			$id = $_GET['user_id'];
			echo "<p><font color=\"red\">Id is ".$id."</font></p>";
			
			$sql = "INSERT INTO userdetails (user_id,Name,age,gender,address,phone_number,email,parent_phone,birthday,paypal_account)
			VALUES ('".$_SESSION["admin"]."','".$Name."', '".$Age."','".$Gender."','".$Address."','".$phone_number."', '".$email."', '".$parent_phone."', '".$birthday."', '".$paypal_account."')";	
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


					 
			
			// Close connection
			mysqli_close($conn);
		?>