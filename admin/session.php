<?php
session_start(); 
if (!$_SESSION['user_name']) { 
	 echo "<script>alert('�㻹û�е�½���뷵�أ�')</script>";
     echo "<script>window.location.href='admin.php';</script>";
     exit();
	 }    

$lifeTime = 24 * 3600;  //����һ��
setcookie(session_name(), session_id(), time() + $lifeTime, "/");

?>