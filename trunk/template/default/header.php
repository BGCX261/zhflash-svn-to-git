<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>动漫天地-总装备部后勤政治部网站</title>
<link href="/ria/default/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/ria/default/js/libs.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#navi').find('li').hover(function(){
		$(this).addClass('hover');
	},function(){
		$(this).removeClass('hover');
	});
});


</script>
</head>

<body>
<!--顶部导航-->
<div class="header">

    <p class="topLink">
    <span class="left">总装备后勤政治部动漫频道</span>
    <span class="right">
    <a href="#">加入收藏</a>
    <a href="#">设为首页</a>
    <a href="#">联系我们</a>
    </span></p>

    <div style="width:100%; height:50px;">
    <img src="/ria/default/banner.png" />
    </div>

    <ul class="navi" id="navi">

        <li class="home"><a href="/">首 页</a><span>首 页</span></li>

		<?php foreach($catalogs as $cata):
			if($cata['parent_id']==0):
				$i=0;
		?>
        <li class="flash <?php if($cata['id']==$top_id):?>on<?php endif; ?>"><a href="/<?php echo $cata['type'];?>.php?cid=<?php echo $cata['id']; ?>"><?php echo $cata['name']; ?></a><span><?php echo $cata['name']; ?></span>
        	<?php if($cata['id']!=$top_id):?>
			<ul class="subNavi">
            	<?php foreach($catalogs as $sub): ?>
                <?php if($sub['parent_id']==$cata['id']):?>
            	<li <?php if(!$i++): ?>class="top"<?php endif;?>><a href="/<?php echo $sub['type'];?>.php?cid=<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></a></li>
                <?php endif;?>
                <?php endforeach; ?>
                <li class="bottom"></li>
            </ul>
            <?php endif;?>
        </li>
        <?php 
		endif;
		endforeach;?>
		<!-- <li class="flash"><a href="/clist.php">Flash学堂</a><span>Flash学堂</span></li> -->
    </ul>

  <ul class="subMenu">
		<?php foreach($catalogs as $cata): ?>
        <?php if($cata['parent_id']==$top_id):?>
        <li><a href="/<?php echo $cata['type'];?>.php?cid=<?php echo $cata['id']; ?>"><?php echo $cata['name'];?></a></li>
        <?php endif; ?>
		<?php endforeach;?>
  </ul>
</div>
<!--//顶部导航-->
<!-- 栏目导航 -->
<div class="topNavi">
	<?php foreach ($catalogs as $top):?>
		<?php if ($top['parent_id']==0):?>
		<dl>
			<dt><a href="/<?php echo $top['type'];?>.php?cid=<?php echo $top['id']; ?>"><?php echo $top['name'];?></a>&nbsp;&nbsp;&nbsp;</dt>
			<?php foreach ($catalogs as $cata):?>
			<?php if ($cata['parent_id']==$top['id']):?>
			<dd><a href="/<?php echo $cata['type'];?>.php?cid=<?php echo $cata['id']; ?>"><?php echo $cata['name'];?></a>&nbsp;&nbsp;&nbsp;</dd>
			<?php endif;?>
			<?php endforeach;?>
		</dl>
		<?php endif;?>
	<?php endforeach;?>
</div>
<!-- //栏目导航 -->