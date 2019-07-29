<?php 
require ("../config/link.php");

$ly_id=$_GET[["ly_id"];

mysql_connect($se_name,$sedb_name,$db_pass) or die("无法连接数据库，请重来");
mysql_select_db($db_name) or die("无法选择数据库，请重来");
$result=mysql_query("delete from ly where ly_id = '$ly_id' ");
if(mysql_affected_rows())
{
	echo "{\"success\":true,\"msg\":\"删除成功!\"}";	
}else{

    echo "{\"success\":false,\"msg\":\"删除失败!\"}";	
}




?>


