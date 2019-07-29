<?php
require ("session.php");  
require ("../config/link.php");if ($page=="") {$page=1;};  
require ("../head-title.php");
?>
<link href="../css/ly_manage.css" rel="stylesheet" type="text/css" />
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
		<h3>留言管理</h3>
		<div class="lyfram">
		  <table width="752" border="1">
              <tr>
                <td width="293">留言内容</td>
                <td width="141">留言时间</td>
                <td width="210">邮箱</td>
                <td width="80">管理操作</td>
              </tr>
<?php
$db=mysql_connect($se_name,$sedb_name,$db_pass) or die ("数据库连接失败");
mysql_select_db($db_name,$db);
$pagesize=20;  //定义每页显示多少条记录
$page=isset($_GET["page"])?intval($_GET["page"]):1;   //定义page的初始值,如果get 传过来的page为空,则page=1,
$total=mysql_num_rows(mysql_query("select * from  ly  order by ly_id "));  //执行查询获取总记录数
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
              <tr>
                <td><?php echo mb_substr($ly_data['content'],0,20,'utf-8'); ?></td>
                <td><?php echo $ly_data['modi_date'];?></td>
                <td><?php echo $ly_data['email'];?></td>
                <td><a class="ly_alink" href="lyedit.php?ly_id=<?php echo $ly_data['ly_id'];?>" target="_top">回复</a>&nbsp; <a class="ly_alink" href="?act=del&ly_id=<?php echo $ly_data['ly_id'];?>">删除</a></td>
              </tr>
<?php } ?>
		  
            </table>
			<p align="center">页<?php echo $page."/".$pagecount?>总页&nbsp;<a href="?page=1">首页</a> <a href="?page=<?php echo $pre?>">上一页</a> <a href="?page=<?php echo $next?>">下一页</a> <a href="?page=<?php echo $last?>">尾页</a> </p>
		</div>
	</div>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->

<!-- 底部版权 -->
<?php require ("../bottom.php");?>

<?php
//删除
$db=mysql_connect($se_name,$sedb_name,$db_pass) or die ("数据库连接失败");
mysql_select_db($db_name,$db);
if(isset($_GET['act']) && $_GET['act']=='del')
{
	$sql="delete from ly where ly_id=".$_GET['ly_id']."";
	mysql_query($sql);
	//echo $sql;
	die("<script>window.alert('删除成功！');window.document.location.href='ly_manage.php';</script>");
}
?>

</body>
</html>
