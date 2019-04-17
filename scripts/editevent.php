<html>
	<head>
		<title>
			Welcome to INFSCI 2710
		</title>
	</head>
	<body>
	<body>
		Update student:
		<?$id = $_GET['id'];?>
		<form name="Input" action="updateStudent.php?id=<?=$id?>'" method="POST">
			Name:<input type="text" name="Name"><br>
			Department:<select type="text" name="Department">
							  <option value="Comp. Sci.">Comp. Sci.</option>
							  <option value="History">History</option>
							  <option value="Finance">Finance</option>
							  <option value="Physics">Physics</option>
							  <option value="Music">Music</option>
							  <option value="Elec. Eng.">Elec. Eng.</option>
							  <option value="Biology">Biology</option>
						</select><br>
			Credit:<input type="text" name="Credit"><br>
			<input type="submit" value="submit">
		</form>		
	<a href=selectstudent.php>Back to home</a>
	</body>
</html>