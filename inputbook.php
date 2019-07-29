<?php require ("head-title.php");?>
<link href="css/inputbook.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="js/input.js"></script>
<script>
$(function(){ 
	$("#btn_ly").click(function(){
	    if (content.value.replace(/\s/g,"")==""){alert("留言内容不能为空!");content.focus();return false }
	    if (yzm.value.replace(/\s/g,"")==""){alert("验证码不能为空!");yzm.focus();return false }
		var img = $("#image").val();  //获取头像路径
		var mail = $("#email").val(); //获取email值
		var ly_cont = $("#content").val(); //获取留言值
		var ly_type = $("#type").val(); //获取留言值
		var yanzm =	$("#yzm").val();  //获取验证码值 
            $.post("check_inputbook.php",{	
                head : img,	
                email : mail,
				content : ly_cont,
				type : ly_type,
				yzm : yanzm
            },function(data){
			var json = $.parseJSON(data);
			if(json.success){ 
				alert(json.msg); 
				window.location.href='index.php';
			} else{
				alert(json.msg);
			}		
			
        }); 
    });
})


var editor=null;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			allowFileManager: true,
       			 //经测试，下面这行代码可有可无，不影响获取textarea的值
       			 //afterCreate: function(){this.sync();}
       			 //下面这行代码就是关键的所在，当失去焦点时执行 this.sync();
       		afterBlur: function(){this.sync();},
			items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
	});
});
</script>
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
		<p> <a href="index.php">首页</a> > 填写留言</p>
	</div>
</div>
<!--内容框架-->
<div class="news_content_canvas">
	<div class="input_form_canvas">	
	 	<ul class="input_fr_list">
			<p><img id="image1" name="image1" src="head/001.gif"></p>
			<li><label>头像选择:</label>
				<select name="image"  id="image" onChange="image1.src=this.value" >
				<option value="head/001.gif">男1</option>
				<option value="head/002.gif">男2</option>
				<option value="head/003.gif">男3</option>
				<option value="head/004.gif">男4</option>
				<option value="head/005.gif">男5</option>
				<option value="head/006.gif">男6</option>
				<option value="head/007.gif">男7</option>
				<option value="head/008.gif">男8</option>
				<option value="head/009.gif">女1</option>
				<option value="head/010.gif">女2</option>
				<option value="head/011.gif">女3</option>
				<option value="head/012.gif">女4</option>
				<option value="head/013.gif">女5</option>
				<option value="head/014.gif">女6</option>
				<option value="head/015.gif">女7</option>
				<option value="head/016.gif">女8</option>
				</select>
			</li>
			<li><label>电子邮箱:</label><input  type="text" name="email" id="email"></input> (可选填)</li>
			<li><label>留言内容:</label>
				<textarea name="content" id="content" style="width:500px;height:200px;visibility:hidden;"></textarea>
			</li>
			<li><label>留言方式:</label>
				<select name="type" id="type">
					<option value="公开" selected="selected">公开</option>
					<option value="仅管理员查看" >仅管理员查看</option>
				</select>
			</li>
			<li><label>验证码: &nbsp;</label>
				<input  type="text" name="yzm" id="yzm"></input>
				<div class="yzdimg">
				<img src="yzt.php" id="codeimg" style="cursor:pointer;" title="点击更换图片" onClick="this.src = this.src+'?'+Math.random();" >&nbsp;<span onClick="document.getElementById('codeimg').src+='?'+Math.random()" style="cursor:pointer; color:#3F79CB; text-decoration:underline;"><span >看不清</span>？</span>
				</div>
			</li>
			<li><input class="ly_btn" name="btn_ly" id="btn_ly" type="submit" value="提交留言" /></li>
		</ul>
	</div>
</div>


<div  class="fengexian"></div> <!-- 分隔线 -->

<!-- 底部版权 -->
<?php require ("bottom.php");?>

</body>
</html>
