<?php
@header("content-Type: text/html; charset=utf-8");
error_reporting(0);

require_once('../config/link.php'); 

$dbcharset = 'utf8';
$sqlfile = '../data/xy_data.sql';//本机导出的Sql文件
 
if(!is_readable($sqlfile)) {
 exit('数据库文件不存在或者读取失败');
}
$fp = fopen($sqlfile, 'rb');
$sql = fread($fp, 2048000);
fclose($fp);
 
$conn=mysql_connect($se_name,$sedb_name ,$db_pass);//指定数据库连接参数
if (!$conn)
{
  die('Could not connect: ' . mysql_error());
}
 
function runquery($sql) {
 global $dbcharset, $db_prefix, $DB, $tablenum;
 
 $sql = str_replace("\r", "\n",$sql);
 $ret = array();
 $num = 0;
 foreach(explode(";\n", trim($sql)) as $query) {
  $queries = explode("\n", trim($query));
  foreach($queries as $query) {
   $ret[$num] .= $query[0] == '#' ? '' : $query;
  }
  $num++;
 }
 unset($sql);
 
 foreach($ret as $query) {
  $query = trim($query);
  if($query) {
   if(substr($query, 0, 12) == 'CREATE TABLE') {
    $name = preg_replace("/CREATE TABLE ([a-z0-9_]+) .*/is", "\\1", $query);
    echo '创建表 '.$name.' ... <font color="#0000EE">------创建数据表成功!------</font><br />';
    mysql_query(createtable($query, $dbcharset));
    $tablenum++;
   } else {
    mysql_query($query);
   }
  }
 }
}
 
function createtable($sql, $dbcharset) {
 $type = strtoupper(preg_replace("/^\s*CREATE TABLE\s+.+\s+\(.+?\).*(ENGINE|TYPE)\s*=\s*([a-z]+?).*$/isU", "\\2", $sql));
 $type = in_array($type, array('MYISAM', 'HEAP')) ? $type : 'MYISAM';
 return preg_replace("/^\s*(CREATE TABLE\s+.+\s+\(.+?\)).*$/isU", "\\1", $sql).
  (mysql_get_server_info() > '4.1' ? " ENGINE=$type DEFAULT CHARSET=$dbcharset" : " TYPE=$type");
}
 
 
mysql_select_db($db_name);

runquery($sql);//导入数据文件

$sql = "INSERT INTO `manage_user` (`mg_id`, `user_name`, `user_pw`, `modi_date`) VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2016-11-22 18:14:33');";
mysql_query($sql); 

$sql = "INSERT INTO `ly` (`ly_id`, `head`, `email`, `content`, `type`, `hf_content`, `modi_date`) VALUES (1, 'head/001.gif', 'sfasdf', 'sdfsdf', '仅管理员查看', '谢谢多提意见!', '2016-12-12 13:02:11'),(2, 'head/010.gif', '32379961@qq.com', '正常，正常测试', '公开', '留言成功。', '2015-12-13 20:53:47');";
mysql_query($sql); 

$sql = "INSERT INTO `sys_info` (`sys_id`, `sys_note1`, `sys_note2`, `modi_date`) VALUES (1, '欢迎使用蓝色天狼留言本,使用中出现什么问题及时向我反映：QQ:328379961', '欢迎使用蓝色天狼留言板', '2017-1-15 00:00:00');";
mysql_query($sql); 

mysql_close($conn);

?>
<br><br>
-----------------------------------------------------------------------------------------------------------
<br><br>
<font color="#00FF00">------为安全考虑请删除install.php文件！------管理员帐号：admin 密码 123456</font>
<br/><br/>
<a href="../admin/admin.php">管理员登陆</a>   
