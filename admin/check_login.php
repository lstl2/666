<?php 
require ("../config/link.php");

$login_name=make_safe($_POST["login_name"]);
$login_pass=md5($_POST["login_pass"]);

session_start();

if ($login_name=="" or  $login_pass=="" )
{
	echo "{\"success\":false,\"msg\":\"登录失败\"}";	
}
else
{
	mysql_connect($se_name,$sedb_name,$db_pass) or die("无法连接数据库，请重来");
	mysql_select_db($db_name) or die("无法选择数据库，请重来");
	$row = mysql_fetch_assoc(mysql_query(" SELECT  *FROM  manage_user  where user_name = '$login_name' and user_pw = '$login_pass'"));
	$dbuser=$row['user_name'];

	if($login_name == $dbuser)
	{
		session_start();
		$_SESSION['user_name']=$login_name;
		echo "{\"success\":true,\"msg\":\"登录成功\"}";		
	}
	else
	{
 		echo "{\"success\":false,\"msg\":\"密码错误\"}";	
	}
}


?>


