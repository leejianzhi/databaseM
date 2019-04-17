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
			//如果提交了数据 那就处理    
			if ($_POST['searching'] =="yes") {    
			echo "<p><h2>搜索结果</h2></p>";     
			//没有搜索关键词    
			if ($_POST['find'] == ""){    
			echo "<p>没有输入关键词呢</p>";    
			exit;    
			}     
			// 否则我们连接到数据库    
			mysql_connect($servername, $username, $password) or die(mysql_error());    
			mysql_select_db($database) or die(mysql_error());    
			// 处理一下关键词    
			$_POST['find'] = strtoupper($_POST['find']);    
			$_POST['find'] = strip_tags($_POST['find']);    
			$_POST['find'] = trim ($_POST['find']);     
			//现在开始搜索了   
			$sql = "SELECT * FROM eventinfo WHERE upper(".$_POST['field'].") LIKE'%".$_POST['find']."%';";
			echo "<p><font color=\"red\">".$sql."</font></p>";
			$result = $conn->query($sql);
			//循环输出结果    
							echo "<table border=1px>";
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
			//我们通过统计结果数量 给出提示    
			$anymatches=mysqli_num_rows($result);    
			if ($anymatches == 0){    
			echo "对不起，没有发现任何匹配关键词的搜索结果……";    
			}    
			//提示搜索关键词    
			echo "<b>Searched For:</b> " .$_POST['find'];    
			$conn->close();
			echo '<a href="chooseevent.php">Back</a>';
		?>
	</body>
</html>