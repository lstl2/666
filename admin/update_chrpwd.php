<?php 
require ("../config/link.php");

$old_pw=md5($_POST["old_pw"]);
$new_pw=md5($_POST["new_pw"]);

mysql_connect($se_name,$sedb_name,$db_pass) or die("无法连接数据库，请重来");
mysql_select_db($db_name) or die("无法选择数据库，请重来");
$row = mysql_fetch_assoc(mysql_query(" SELECT  *FROM  manage_user  where user_name = 'admin' and user_pw = '$old_pw'"));
$db_pw=$row['user_pw'];

if($old_pw == $db_pw){

	$result=mysql_query("update manage_user set user_pw='$new_pw'  where  user_name = 'admin' ");
	
	if(mysql_affected_rows())
		{
			echo "{\"success\":true,\"msg\":\"修改成功!\"}";	
		}else{

  	 		 echo "{\"success\":false,\"msg\":\"修改失败,原密码不能与新密码一样!\"}";	
		}

}else{

	echo "{\"success\":false,\"msg\":\"原密码输入错误!\"}";	
}




?>


