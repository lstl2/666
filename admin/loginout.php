<?php
session_start();        //�����Ự
session_unset();       //ɾ���Ự
session_destroy();   //�����Ự
setcookie(session_name(), session_id(), time() - 86400);
setcookie(session_name(), session_id(), time() - 86400, "/~rasmus/", ".utoronto.ca", 1);
$_SESSION['user_name']=null;
header("location: admin.php");
?>
