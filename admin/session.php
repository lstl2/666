<?php
session_start(); 
if (!$_SESSION['user_name']) { 
	 echo "<script>alert('你还没有登陆，请返回！')</script>";
     echo "<script>window.location.href='admin.php';</script>";
     exit();
	 }    

$lifeTime = 24 * 3600;  //保存一天
setcookie(session_name(), session_id(), time() + $lifeTime, "/");

?>