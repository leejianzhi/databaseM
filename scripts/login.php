<?php
session_start();
$_SESSION["admin"] = null;
if (!isset($_SESSION['visits'])) {$visits=0;}
$visits = $_SESSION['visits'];
if ($visits>10)
{
	session_destroy();
	echo"<script charset=UTF-8>alert('登录次数过多，退出系统！');window.opener=null;window.open('','_self');window.close();</script>";
}
?>
<!--登录信息匹配数据库-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
include("conn.php");



if(isset($_POST['user']) and isset($_POST['pwd']) )
{
	if($_POST['user']!=null and $_POST['pwd']!=null)
	{
		if($_POST['identity']=='admin')
		{
			$select=mysql_query("select * from adminster where administer_id=$_POST[user]  and password='$_POST[pwd]'",$conn);
			if(mysql_num_rows($select)==1)
			{
				echo"<script charset=UTF-8>alert('login success');window.location.href='selectevent.php'</script>";
				$_COOKIE['user']=$_POST['user'];
			}
			else
			{
				$_SESSION['visits']=$_SESSION['visits'] + 1;
				echo"<script charset=UTF-8>alert('login fail0');window.location.href='login.php';</script>";
			}
		}
		else if($_POST['identity']=='user')
		{
			$select=mysql_query("select * from  user where user_name='$_POST[user]' and password='$_POST[pwd]'",$conn);
			if(mysql_num_rows($select)==1)
			{
				
				session_start();
				$sql = "select user_id from  user where user_name='$_POST[user]' and password='$_POST[pwd]'";
				$result = mysql_query($sql,$conn);
				$row = mysql_fetch_array($result);
				$_SESSION["admin"] = $row['user_id'];
				echo"<script charset=UTF-8>alert('login success');window.location.href='chooseevent.php';</script>";
				$_COOKIE['user']=$_POST['user'];
			}
			else
			{
				$_SESSION['visits']=$_SESSION['visits'] + 1;
				echo"<script charset=UTF-8>alert('login fail2');window.location.href='login.php';</script>";
			}
		}		
		else if($_POST['identity']=='coach')
		{
			$select=mysql_query("select * from coach where coach_id=$_POST[user]  and password='$_POST[pwd]'",$conn);
			if(mysql_num_rows($select)==1)
			{
				session_start();
				$_SESSION["admin"] = $_POST[user];
				echo"<script charset=UTF-8>alert('login success');window.location.href='coachevent.php'</script>";
				$_COOKIE['user']=$_POST['user'];
			}
			else
			{
				$_SESSION['visits']=$_SESSION['visits'] + 1;
				echo"<script charset=UTF-8>alert('login fail1');window.location.href='login.php';</script>";
			}
		}
	}
	else
	{
		/*$_COOKIE["visits"]=$_COOKIE["visits"]+1;*/
		$_SESSION['visits']=$_SESSION['visits'] + 1;
		echo"<script charset=UTF-8>alert('login fail please input id and password');window.location.href='login.php';</script>";
	}
}
else
	{
				$_SESSION['visits']=$_SESSION['visits'] + 1;
				echo"<script charset=UTF-8>alert('Username or Password missing');window.location.href='/index.html';</script>";
	}
?>