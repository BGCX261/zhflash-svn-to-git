<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>用户登陆</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/ria/admin/jquery.js"></script>
<style type="text/css">
body,html{ margin:0px; padding:0px; background-color:#f0FDF1;width:100%; font-size:12px;}
.box{width:80%;margin:40px auto;clear:both;}
.head{margin:0px; width:100%; height:50px; line-height:50px; font-weight:bold; font-size:18px; color:#FFF; background:url(/ria/admin/top_bg.jpg) repeat-x;}
input{width:150px;height:22px;line-height:22px}
</style>
</head>
<body>
<div class="head">
&nbsp;&nbsp;&nbsp;运营平台管理登陆</div>
<div class="box">
	<div style="color:red;width:100%;clear:both;height:30px;line-height:30px;" id="errorMsg"></div>
	<label>用户名：<input type="text" id="uname" /></label><br /><br />
	<label>密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" id="passwd" /></label><br /><br/>
	<label><button id="submit" type="button">登陆</button></label>
</div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
	$('#submit').click(function(){
		var uname = $('#uname').val();
		var passwd = $('#passwd').val();

		if(uname==''){
			$('#errorMsg').html('用户名没有填写'); return false;
		}

		if(passwd==''){
			$('#errorMsg').html('密码没有填写'); return false;
		}

		$.post(
			'/admin/index/login',
			{
				uname: uname,
				passwd: passwd
			},function(ret){
				if(ret.code==200){
					window.location.href='/admin';
				}else{
					$('#errorMsg').html(ret.msg);
				}
			},'JSON'
		);
	});
})

</script>