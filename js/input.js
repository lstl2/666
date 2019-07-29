// JavaScript Document


//inputbook留言表单验证
function inputcheckdata(){
	if (input_form.yzm.value.replace(/\s/g,"")==""){alert("验证码不能为空!");input_form.yzm.focus();return false }
}



//管理员登陆按钮特效
$(document).ready(function(){
	$("#sub_btn").css("cursor","pointer").click(function(){
	})
});

//inputbook留言表单按钮特效
$(document).ready(function(){
	$("#btn_ly").css("cursor","pointer").click(function(){
	})
});

