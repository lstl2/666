<?php 

/**
' * ======791cf1cf62aa48f9d4530b2e3da5cc9e======================================================================
' * 版权所有 (C) XueLiKai.Com，并保留所有权利。
' * 官方网址: http://Www.dbcha.com （请保留版权信息）
' * ------791cf1cf62aa48f9d4530b2e3da5cc9e----------------------------------------------------------------------
' * $Author: yujianyue <admin@ewuyi.net> $
' * $LastEdit: 2016-09-24 $
' * ------791cf1cf62aa48f9d4530b2e3da5cc9e----------------------------------------------------------------------
' * 代码不加密；你可以二次开发以便更适合你的需求 ，但不得：公开发布、公开销售。
' * 代码无域名、时间限制，非常通用；你可以安装多份，单位主体请购买本软件。
' * ======791cf1cf62aa48f9d4530b2e3da5cc9e:conn.php=============================================================
*/

error_reporting(0);
header("content-Type: text/html; charset=utf-8");//输出编码GBK

//设置好以下3-8个参数（双引号内内容）
$tiaojian1="姓名";			//查询条件1列标题，跟excel列头一致，注意无空格回车;

$UpDir="sos";			//设置数据库所在目录(文件夹名称)请修改，修改后更名对应文件夹。
$title="蓝色天狼成绩查询系统";			//设置查询标题,相信你懂的。
$copyr="蓝色天狼集团";				//设置底部版权文字,相信你懂的。
$copyu="http://www.lstl.tk/";			//设置底部版权连接,相信你懂的。

$ismas="0";				//设置是否使用验证码，1是0否。

//设置好以上3-8个参数（双引号内内容）


/*
//	「SAE」免费注册地址：http://t.cn/R4QorPE （免费空间，免费二级域名，免备案）
//	*************************
//	作者主页:http://12391.net
//	作者邮箱:admin@ewuyi.net
//	作者网店:https://aiyaha.taobao.com/


都是超级实用，灵活易用的方案：

通用成绩查询系统解决方案(简单通用易用):

方案4:微信公众号N选1个查询条件直接查询工资、成绩、水电费等
自助开通试用:http://new.12391.net/ 
视频教程下载:http://pan.baidu.com/s/1ge6BPEr 
代码购买:https://item.taobao.com/item.htm?id=520496908275 
整体服务:https://item.taobao.com/item.htm?id=529624346797 

方案3(荐):微信公众号一对一绑定才可以查询工资、成绩、水电费等
自助开通试用:http://add.96cha.com/ 
代码购买:https://item.taobao.com/item.htm?id=44248394675 
整体服务:https://item.taobao.com/item.htm?id=528187132312 

方案2(荐):用户在线登录查询工资成绩水电费等，可自助修改密码
自助开通试用:http://add.dbcha.com/ 
视频教程下载:http://pan.baidu.com/s/1boANMwv 
代码购买:https://item.taobao.com/item.htm?id=43193387085 
整体服务:https://item.taobao.com/item.htm?id=528108807297 

方案1:直接通过设定的（1-3个）查询条件查询
免费即时开通:http://add.12391.net/ 
视频教程下载:http://pan.baidu.com/s/1eSoDn26 
代码购买:https://item.taobao.com/item.htm?id=528692002051 
整体服务:https://item.taobao.com/item.htm?id=520023732507 

代码版：不加密，无域名限制，无时间限制,一次付费一直可用(域名和网站空间费用另外自理)
整体服务：无需域名 无需空间 无需代码 无需技术人员 无需备案，即开即用 ,按时间付费

通用模糊检索系统解决方案(简单通用易用):

方案1:通用多选一模糊查询系统单输入框版
自助开通试用:http://add.xuelikai.com:1111/ 
视频教程下载:http://pan.baidu.com/s/1ge6BPEr (只参考第一步第二步)
代码购买:https://item.taobao.com/item.htm?id=520167788658 

方案2:通用多选一模糊查询系统下拉可选条件版
自助开通试用:http://add.xuelikai.com:2222/
视频教程下载:http://pan.baidu.com/s/1ge6BPEr (只参考第一步第二步)
代码购买:https://item.taobao.com/item.htm?id=520167788658 

方案3(荐):通用多选一模糊查询系统多输入框版
自助开通试用:http://add.xuelikai.com:3333/
视频教程下载:http://pan.baidu.com/s/1ge6BPEr (只参考第一步第二步)
代码购买:https://item.taobao.com/item.htm?id=520167788658 　

以上三个模糊检索方案也可以用于多选一精准查询系统

//	#####以上无需修改但有用注意查看哦######
*/


function webalert($Key){
 $html="<script>\r\n";
 $html.="alert('".$Key."');\r\n";
 $html.="history.go(-1);\r\n";
 $html.="</script>";
 exit($html);
}


function characet($data){
  if(!empty($data) ){    
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
    if( $fileType != 'UTF-8'){   
      $data = mb_convert_encoding($data ,'utf-8' , $fileType);   
    }   
  }   
  return $data;    
}

function charaget($data){
  if(!empty($data) ){    
    $fileType = mb_detect_encoding($data , array('UTF-8','GBK','LATIN1','BIG5')) ;   
    if( $fileType != 'GBK'){   
      $data = mb_convert_encoding($data ,'GBK' , $fileType);   
    }   
  }   
  return $data;    
}


//付费版可以选项时间排序
function traverse($dir_name = '.') {
$dir = opendir($dir_name); 
$basename = basename($dir_name); 
$fileArr = array(); 
while ($file_name = readdir($dir)) 
{ 
if (($file_name ==".") || ($file_name == "..")) { 
 } else if(is_dir($file_name)) {
 } else {
$filetp=substr($file_name,-4);
$filetp=strtolower($filetp);
$filesw=substr($file_name,0,-4);//注意后缀是4位数
if($filetp == ".xls"){
$file = $filesw;    //
echo '<option value="'.characet($file).'">' . characet($file) . '</option>';
} 
 } 
} 
closedir($dir); 
} 

//*************************
//	#####以下无需修改【不影响使用】但有用注意查看哦######
 // 成绩工资水电费通用查询系统其他方案:

 // 50元:asp无需后台版(12款选1):
 // https://item.taobao.com/item.htm?id=45703415332 

 // 60元:PHP无需后台版(36款选1):
 // https://item.taobao.com/item.htm?id=45808268273 

 // 108元:PHP多级下拉版(8款选1):
 // https://item.taobao.com/item.htm?id=43263796985 

 // N选1模糊查询系统解决方案(超过8款68元起):
 // https://item.taobao.com/item.htm?id=520167788658 

 // N选1精准查询系统解决方案(超过8款68元起):
 // https://item.taobao.com/item.htm?id=520167788658

//*************************

?>