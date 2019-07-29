<?php 
require ("../config/link.php");

$ly_id=$_POST["ly_id"];
$modi_date=$_POST["modi_date"];
$content=$_POST["content"];
$hf_content=$_POST["hf_content"];

mysql_connect($se_name,$sedb_name,$db_pass) or die("无法连接数据库，请重来");
mysql_select_db($db_name) or die("无法选择数据库，请重来");
$result=mysql_query("update ly set content='$content',hf_content='$hf_content',modi_date='$modi_date' where ly_id='$ly_id' ");
if(mysql_affected_rows())
{
	echo "{\"success\":true,\"msg\":\"回复成功!\"}";	
}else{

    echo "{\"success\":false,\"msg\":\"回复失败!\"}";	
}

?>


