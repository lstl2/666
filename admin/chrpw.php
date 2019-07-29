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
	    if (old_pw.value.replace(/\s/g,"")==""){alert("原密码不能为空!");old_pw.focus();return false }
	    if (new_pw.value.replace(/\s/g,"")==""){alert("新密码不能为空!");new_pw.focus();return false }
		var oldpw = $("#old_pw").val();
		var newpw =	$("#new_pw").val();
            $.post("update_chrpwd.php",{	
                old_pw : oldpw,	
                new_pw : newpw
            },function(data){
				var json = $.parseJSON(data);
					if(json.success){
						alert(json.msg);
						window.location.href='chrpw.php';
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
		<h3>帐号密码修改</h3>
		<ul class="main_form_list">
			<li><p>输入原密码:</p> <input name="old_pw" type="password" id="old_pw"  style="width:200px;" /></li>
			<li><p>输入新密码:</p> <input name="new_pw" type="password" id="new_pw"  style="width:200px;" /></li>
			<li><input class="btn_1" name="sub_btn" id="sub_btn" type="submit" value="提交" /></li>
		</ul>
	</div>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->

<!-- 底部版权 -->
<?php require ("../bottom.php");?>




</body>
</html>
