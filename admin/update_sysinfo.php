<?php 
require ("../config/link.php");

$sys_note1=make_safe($_POST["sys_note1"]);
$sys_note2=make_safe($_POST["sys_note2"]);

mysql_connect($se_name,$sedb_name,$db_pass) or die("无法连接数据库，请重来");
mysql_select_db($db_name) or die("无法选择数据库，请重来");
$result=mysql_query("update sys_info set sys_note1='$sys_note1',sys_note2='$sys_note2' where sys_id='1' ");
if(mysql_affected_rows())
{
	echo "{\"success\":true,\"msg\":\"修改成功!\"}";	
}else{

    echo "{\"success\":false,\"msg\":\"修改失败,你没有更改数据!\"}";	
}

?>


