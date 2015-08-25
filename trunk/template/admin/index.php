<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>猜猜看-运营平台</title>
<style type="text/css">
body,html{font-size:12px;margin:0px;padding:0px;font-weight:normal;background-color:#f0FDF1}
.menu{_position:absolute}
.menu a{color:#fff;text-decoration:none;}

.menu .menuList{ display:none;font-size:12px;}
.menu:hover,.menu.hover{background:#000}
.menu:hover .menuList,.menu.hover .menuList{display:block; position:relative;z-index:999;background:#000;width:100px;height:auto;color:#FFF}
.menuList ul{ display:block;margin:0px;padding:0px;}
.menuList ul li{display:block;margin:0px;padding:0px;height:28px;line-height:28px;width:100px;text-align:center;}
.menuList ul li dl{ display:none;position:absolute;padding:0px;margin-top:-28px;*+margin-top:0px;background:#666;margin-left:100px;*+margin-left:0px;}
.menuList ul li:hover,.menuList ul li.hover{background:#666}
.menuList ul li:hover dl,.menuList ul li.hover dl{display:block;}
.menuList ul li:hover dl dd,.menuList ul li.hover dl dd{display:block;width:80px;height:28px;line-height:28px;margin:0px;padding:0px 6px;text-align:left;}
.menuList ul li:hover dl dd:hover,.menuList ul li.hover dl dd.hover{background:#999}
</style>
</head>
<body>
<div style="width:100%; height:50px;
line-height:50px; font-weight:bold; font-size:18px; 
color:#FFF; background:url(/ria/admin/top_bg.jpg) repeat-x;
position:fixed;top:0px;
">
<div style="width:100px;float:left;text-align:center" class="menu support_hover">菜单<div class="menuList">
		<ul>
			<?php foreach ($menuList as $item):?>
			<?php if ($item['level']==1 && !$item['hidden']):?>
			<li class="support_hover">
				<a href="<?php echo $item['url'];?>"><?php echo $item['name'];?></a>
				<dl>
			<?php endif;?>
					<?php foreach ($menuList as $sub):?>
					<?php if ($sub['pid']==$item['id'] && !$sub['hidden'] && !$item['hidden']):?>
					<dd class="support_hover"><a href="<?php echo $sub['url'];?>"><?php echo $sub['name'];?></a></dd>
					<?php endif;?>
					<?php endforeach;?>
			<?php if ($item['level']==1 && !$item['hidden']):?>
				</dl>
			</li>
			<?php endif;?>
			<?php endforeach;?>
		</ul>
	</div>
</div>
<div style="width:300px;float:right; text-align:right;">猜猜看运营平台&nbsp;&nbsp;&nbsp;</div>
</div>
<div style="margin-top:50px;background-color:#f0FDF1">
<iframe src="/admin/user/my" width="100%" height="auto" id="iframepage" name="iframepage" frameborder="0"></iframe>

</div>
</body>
</html>

<script type="text/javascript" src="/ria/admin/jquery.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$('.menuList').find('a').live('click', function(){
		var url = $(this).attr('href');
		$('#iframepage').attr('src', url);
		return false;
	});
	$('#iframepage').height($(window).height()-50);

	$('.support_hover').hover(function(){
		$(this).addClass('hover');
	},function(){
		$(this).removeClass('hover');
	});
});

</script> 
