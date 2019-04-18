<!--注册提交数据-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
include("conn.php");
if(isset($_POST['user']) and isset($_POST['pwd']) and isset($_POST['pwdconfirm']))
{
	if($_POST['user']!=null and $_POST['pwd']!=null and $_POST['pwdconfirm']!=null)
	{
		if($_POST['pwd']!=$_POST['pwdconfirm'])
		{
			echo "<script charset=UTF-8>alert('Passowrd cannot match！');window.location.href='register.html'</script>";
		}
		if((strlen($_POST['pwd'])<6) || (strlen($_POST['pwd'])>15))
		{
			echo "<script charset=UTF-8>alert('Password should 6 - 15 digits long！');window.location.href='register.html'</script>";
		}
		$select=mysql_query("select * from user where user_name='$_POST[user]'",$conn);
		if(mysql_num_rows($select)==0)
		{							
				$insert=mysql_query("insert into finalProject.user (user_id,user_name,password)values(Null,'$_POST[user]','$_POST[pwd]')",$conn);
				if($insert)
				{
					echo "<script charset=UTF-8>alert('Successfully Registered！');window.location.href='chooseevent.php'</script>";
				}			
				else
				{
					echo "<script charset=UTF-8>alert('Cannot register Admin account ');window.location.href='/register.html'</script>";
				}
			}
		else
		{
				echo "<script charset=UTF-8>alert('User Exist！');window.location.href='/register.html'</script>";
		}
		
	}
	else
	{
		echo "<script charset=UTF-8>alert('Please compelete the register form！');window.location.href='register.html'</script>";
	}
}
else
{
	echo "<script charset=UTF-8>alert('please complete the register form！');window.location.href='register.html'</script>";
}
?>