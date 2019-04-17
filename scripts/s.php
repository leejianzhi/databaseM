<h2>Search</h2>    
<form name="search" method="post" action="<?php echo localhost/iservice/s.php;?>">   
Seach for: <input type="text" name="find" /> in    
<Select NAME="field">   
<Option VALUE="coach">First Name</option>   
<Option VALUE="lname">Last Name</option>   
<Option VALUE="info">Profile</option>   
</Select>   
<input type="hidden" name="searching" value="yes" />   
<input type="submit" name="search" value="Search" />   
</form>
<?    
//如果提交了数据 那就处理    
if ($searching =="yes") {    
echo "<p><h2>搜索结果</h2></p>";     
//没有搜索关键词    
if ($find == ""){    
echo "<p>没有输入关键词呢</p>";    
exit;    
}     
// 否则我们连接到数据库    
mysql_connect("localhost", "root", "mysql") or die(mysql_error());    
mysql_select_db("iservice") or die(mysql_error());    
// 处理一下关键词    
$find = strtoupper($find);    
$find = strip_tags($find);    
$find = trim ($find);     
//现在开始搜索了    
$data = mysql_query("SELECT * FROM eventinfo WHERE upper($field) LIKE'%$find%'");    
//循环输出结果    
while($result = mysql_fetch_array( $data )) {    
echo $result['fname'];    
echo " ";    
echo $result['lname'];    
echo "<br>";    
echo $result['info'];    
echo "<br>";    
echo "<br>";    
}     
//我们通过统计结果数量 给出提示    
$anymatches=mysql_num_rows($data);    
if ($anymatches == 0){    
echo "对不起，没有发现任何匹配关键词的搜索结果……";    
}    
//提示搜索关键词    
echo "<b>Searched For:</b> " .$find;    
}    
?>