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
			echo "<script charset=UTF-8>alert('两次密码不相同！');window.location.href='register.html'</script>";
		}
		if((strlen($_POST['pwd'])<6) || (strlen($_POST['pwd'])>15))
		{
			echo "<script charset=UTF-8>alert('密码长度应在6到15之间！');window.location.href='register.html'</script>";
		}
		$select=mysql_query("select * from user where user_name='$_POST[user]'",$conn);
		if(mysql_num_rows($select)==0)
		{							
				$insert=mysql_query("insert into iservice.user (user_id,user_name,password)values(Null,'$_POST[user]','$_POST[pwd]')",$conn);
				if($insert)
				{
					echo "<script charset=UTF-8>alert('注册成功！');window.location.href='login.php'</script>";
				}			
				else
				{
					echo "<script charset=UTF-8>alert('admin注册失败！请检查各项资料是否有误！');window.location.href='register.html'</script>";
				}
			}
		else
		{
				echo "<script charset=UTF-8>alert('注册失败！用户名已存在！');window.location.href='register.html'</script>";
		}
		
	}
	else
	{
		echo "<script charset=UTF-8>alert('请填写完整信息！');window.location.href='register.html'</script>";
	}
}
else
{
	echo "<script charset=UTF-8>alert('请填写完整信息！');window.location.href='register.html'</script>";
}
?>