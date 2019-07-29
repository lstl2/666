<?php 
require ("config/link.php");

$head=make_safe($_POST["head"]);
$email=make_safe($_POST["email"]);
$content=make_safe($_POST["content"]);
$type=make_safe($_POST["type"]);
$yzm=make_safe($_POST["yzm"]);
$hf_content="";
$modi_date=date("Y-m-d H:i:s");

session_start();

if($yzm==$_SESSION["Checknum"]){
	
	mysql_connect($se_name,$sedb_name,$db_pass) or die("无法连接数据库，请重来");
	mysql_select_db($db_name) or die("无法选择数据库，请重来");
	$sql = "insert into ly(head,email,content,type,hf_content,modi_date) values('$head','$email','$content','$type','$hf_content','$modi_date')";
	$result=mysql_query($sql);
	if(mysql_affected_rows())
	{
		echo "{\"success\":true,\"msg\":\"留言成功!\"}";	
	}else{
		echo "{\"success\":false,\"msg\":\"留言失败!\"}";	
	}
		
}else{
	echo "{\"success\":false,\"msg\":\"验证码错误\"}";

}



?>


