<?php
session_start();        //启动会话
session_unset();       //删除会话
session_destroy();   //结束会话
setcookie(session_name(), session_id(), time() - 86400);
setcookie(session_name(), session_id(), time() - 86400, "/~rasmus/", ".utoronto.ca", 1);
$_SESSION['user_name']=null;
header("location: admin.php");
?>
