<?php 
require ("session.php");
require ("../head-title.php");
?>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/input.js"></script>
<script type="text/javascript">
$(function(){ 
	$("#sub_btn").click(function(){
	    if (sys_note1.value.replace(/\s/g,"")==""){alert("系统公告1不能为空!");sys_note1.focus();return false }
		if (sys_note2.value.replace(/\s/g,"")==""){alert("系统公告2不能为空!");sys_note2.focus();return false }
		var note1 =	$("#sys_note1").val();
		var note2 =	$("#sys_note2").val();
            $.post("update_sysinfo.php",{	
                sys_note1 : note1,
				sys_note2 : note2
            },function(data){
				var json = $.parseJSON(data);
					if(json.success){
						alert(json.msg);
						window.location.href='main.php';
					} else{
						alert(json.msg);
					}	
        }); 
    });
})
</script>
<body>
<div class="index_top_canvas">
	<!--首页logo-->
	<div class="index_top1_canvas">
		<img src="../images/logo.png" />
	</div>
	<!--首页导航-->
	<ul class="navi_bj">
		<li class="navi_t1"><a href="../index.php" >首页</a></li>
		<li class='menu_line'></li>
		<!--如果需要填加导航栏，直接去掉备注可以正常使用-->
		<!--<li><a href="news.php">导航栏位</a></li>
		<!--<li class='menu_line'></li>-->
	</ul>
</div>
<!--首页子导航-->
<div class="news_top_canvas">
	<div class="news_top_content">
		<p> <a href="#">首页</a> > 后台管理</p> <span>欢迎您  <?php session_start(); echo $_SESSION['user_name']; ?> 管理员</span>
	</div>
</div>
<!--内容框架-->
<?php
require ("../config/link.php"); //连接数据库

$sql = "SELECT * FROM sys_info  ORDER BY sys_id DESC LIMIT 0 , 1";
$result = mysql_db_query($db_name, $sql); 
$sys_data = mysql_fetch_array($result);
$sys_note1=$sys_data['sys_note1'];
$sys_note2=$sys_data['sys_note2'];

?>
<div class="news_content_canvas">
	<div class="left_main">
		<ul>
			<li><a href="main.php">系统公告</a></li>
			<li><a href="chrpw.php">帐号管理</a></li>
			<li><a href="ly_manage.php">留言管理</a></li>
			<li><a href="loginout.php">退出后台</a></li>
		</ul>
	</div>
	<div class="right_main">
		<h3>小袁在线留言板基本信息设置</h3>
		<ul class="main_form_list">
			<li><p>系统公告1:</p> <textarea name="sys_note1"  id="sys_note1"  cols="50" rows="5"><?php echo $sys_note1;?></textarea></li>
			<li><p>系统公告2:</p><textarea name="sys_note2"  id="sys_note2"  cols="50" rows="5"><?php echo $sys_note2;?></textarea></li>
			<li><input class="btn_1" name="sub_btn" id="sub_btn" type="submit" value="提交" /></li>
		</ul>
	</div>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->

<!-- 底部版权 -->
<?php require ("../bottom.php");?>

</body>
</html>
