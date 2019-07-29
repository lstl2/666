<?php require ("../head-title.php");?>
<link href="../css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/input.js"></script>
<script type="text/javascript">
$(function(){ 
	login_name.focus();
	$("#sub_btn").click(function(){
	    if (login_name.value.replace(/\s/g,"")==""){alert("用户名不能为空!");login_name.focus();return false }
	    if (login_pass.value.replace(/\s/g,"")==""){alert("密码不能为空!");login_pass.focus();return false }
		var name = $("#login_name").val();
		var pw=	$("#login_pass").val();
            $.post("check_login.php",{	
                login_name : name,	
                login_pass : pw
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
		<p> <a href="#">首页</a> > 后台管理</p>
	</div>
</div>
<!--内容框架-->
<div class="news_content_canvas">
	<div class="login_canvas">
		<h3>管理员登陆</h3>
		<ul class="form_list">
			<li>用户名: <input name="login_name" id="login_name" type="text" /></li>
			<li>密 码 : <input name="login_pass" id="login_pass" type="password" /></li>
			<li><input class="btn_1" name="sub_btn" id="sub_btn" type="submit" value="登陆" /></li>
		</ul>
	</div>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->


<!-- 底部版权 -->
<?php require ("../bottom.php");?>




</body>
</html>
