<?php require ("../head-title.php");?>
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/input.js"></script>
<script type="text/javascript">
$(function(){ 
	$("#sub_btn").click(function(){
	    if (web_date.value.replace(/\s/g,"")==""){alert("留言时间不能为空!");web_date.focus();return false }
	    if (web_content.value.replace(/\s/g,"")==""){alert("留言内容不能为空!");web_content.focus();return false }
		if (web_hf.value.replace(/\s/g,"")==""){alert("回复内容不能为空!");web_hf.focus();return false }
		var db_date= $("#web_date").val();
		var db_content = $("#web_content").val();
		var db_hf =	$("#web_hf").val();
		var db_id = $("#hid").val();
            $.post("update_lyedit.php",{	
                modi_date : db_date,	
                content : db_content,
				hf_content : db_hf,
				ly_id : db_id
            },function(data){
				var json = $.parseJSON(data);
					if(json.success){
						alert(json.msg);
						window.location.href='ly_manage.php';
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
$id=$_GET['ly_id'] or die("参数有误");
$sql = "SELECT * FROM ly where ly_id='$id' ";
$result = mysql_db_query($db_name, $sql); 
$ly_data = mysql_fetch_array($result);
$db_date=$ly_data['modi_date'];
$db_content=$ly_data['content'];
$db_hf=$ly_data['hf_content'];

?>
<div class="news_content_canvas">
	<div class="left_main">
		<ul>
			<li><a href="main.php">基本信息</a></li>
			<li><a href="chrpw.php">帐号管理</a></li>
			<li><a href="#">留言管理</a></li>
			<li><a href="#">版权声明</a></li>
			<li><a href="loginout.php">退出后台</a></li>
		</ul>
	</div>
	<div class="right_main">
		<h3>留言信息管理——回复</h3>
		<ul class="main_form_list">
			<li><p>留言时间:</p> <input name="web_date" type="text" id="web_date"  style="width:370px;" value="<?php echo $db_date;?>"/></li>
			<li><p>留言内容:</p> <textarea name="web_content"  id="web_content"  cols="50" rows="5"><?php echo $db_content;?></textarea></li>
			<li><p>留言回复:</p><textarea name="web_hf"  id="web_hf"  cols="50" rows="5"><?php echo $db_hf;?></textarea></li>
			<li><input type="hidden" id="hid" value="<?php echo $id;?>"><input class="btn_1" name="sub_btn" id="sub_btn" type="submit" value="提交" /> </li>
		</ul>
	</div>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->

<!-- 底部版权 -->
<?php require ("../bottom.php");?>




</body>
</html>
