<?php require ("head-title.php");?>
<link href="css/guestbook.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<body>
<div class="index_top_canvas">
	<!--首页logo-->
	<div class="index_top1_canvas">
		<img src="images/logo.png" />
	</div>
	<!--首页导航-->
	<ul class="navi_bj">
		<li class="navi_t1"><a href="index.html" >蓝色天狼官网</a></li>
		<li class='menu_line'></li>
		<!--如果需要填加导航栏，直接去掉备注可以正常使用-->
		<li><a href="index.php">留言首页</a></li>
		<li class='menu_line'></li>
	</ul><br>
</div>
<!--首页子导航-->
<div class="news_top_canvas">
	<div class="news_top_content">
		<p> <a href="index.php">首页</a> > 本站留言</p>
	</div>
</div>
<!--内容框架-->
<?php
	require ("config/link.php");
	$sql = "SELECT * FROM sys_info where sys_id='1' ";
	$result = mysql_db_query($db_name, $sql); 
	$gg_data = mysql_fetch_array($result);
	$db_gd1=$gg_data['sys_note1'];
	$db_gd2=$gg_data['sys_note2'];
?>

<div class="news_content_canvas">
	<a href="inputbook.php" class="add_guest"></a>
	<img src="images/announce.gif" />
	<div class="gg-text">
		<div id="andyscroll">
			<div id="scrollmessage">
				<ul class="gg_list">
					<li><a href="#"><?php echo $db_gd1;?></a></li>
					<li><a href="#"><?php echo $db_gd2;?></a></li>
				<ul>
	       </div>
       </div>
	<script charset="utf-8" src="js/index-notice.js"></script>
	</div>	
	<!--留言列表-->
<?php 
if ($page=="") {$page=1;};
$db=mysql_connect($se_name,$sedb_name,$db_pass) or die ("数据库连接失败");
mysql_select_db($db_name,$db);
$pagesize=20;  //定义每页显示多少条记录
$page=isset($_GET["page"])?intval($_GET["page"]):1;   //定义page的初始值,如果get 传过来的page为空,则page=1,
$total=mysql_num_rows(mysql_query("select * from ly  order by ly_id "));  //执行查询获取总记录数
$pagecount=ceil($total/$pagesize);  //计算出总页数
if ($page>$pagecount){
    $page=$pagecount;  // 对提交过来的page做一些检查
}
if ($page<=0){ 
    $page=1;                   // 对提交过来的page做一些检查
}
$offset=($page-1)*$pagesize;   //偏移量
$pre=$page-1;           //上一页
$next=$page+1;         //下一页
$first=1;                       //第一页
$last=$pagecount;    //末页
$exec="select * from ly order by ly_id desc limit $offset,$pagesize"; //执行查询
$result=mysql_query($exec);
while ($ly_data=mysql_fetch_array($result)){
   ?>
	<div class="guest_canvas">
		<div class="gu_list">
			<h4>留言人员</h4>
			<img src="<?php echo $ly_data['head'];?>" />
		</div>
		<div class="gu_list1">
			<p class="ly_date">发表于 <?php echo $ly_data['modi_date'];?> | 邮箱：<?php echo $ly_data['email'];?></p>
			<?php if($ly_data['type']=="公开"){?>
			<p class="ly_content"><?php echo $ly_data['content'];?></p>
			<?php }else{?>
			<p class="ly_content">------留言内容已保密，仅管理员查看------</p>
			<?php }?>
			<?php if(!empty($ly_data['hf_content'])){?>
				<p class="hf_content">管理员回复: <?php echo $ly_data['hf_content'];?></p>
			<?php }?>
		</div>
	</div>
	<div class="guest_xian"></div>
<?php 
}
?>
	<div class="ly_feyelist">页<?php echo $page."/".$pagecount?>总页&nbsp;<a href="?page=1">首页</a> <a href="?page=<?php echo $pre?>">上一页</a> <a href="?page=<?php echo $next?>">下一页</a> <a href="?page=<?php echo $last?>">尾页</a></div>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->

<!-- 底部版权 -->
<?php require ("bottom.php");?>

</body>
</html>
