<!--Connect to database-->
<?php
$conn=mysql_connect("localhost","root","mysql");
mysql_select_db("finalProject",$conn);
mysql_query("set names utf-8");
?>