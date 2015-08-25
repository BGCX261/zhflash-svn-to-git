<?php
include_once 'header.php';
?>

<form action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>" method="post">
<dl>
	<dt>用户分组</dt>
	<dd>
		<label for="name">分组名称</label>
		<input type="text" value="<?php echo $group['name'];?>" name="name" />
	</dd>
	<dd>
		<label for="permission">权限列表</label>
		<input type="radio" name="permission[type]" value="super" <?php if ($group['permission']['type']=='super'):?>checked="checked"<?php endif;?> />全部权限
		<input type="radio" name="permission[type]" value="normal" <?php if ($group['permission']['type']=='normal' || !$group['permission']['type']):?>checked="checked"<?php endif;?> />指定权限
	</dd>
	<dd>
	<?php foreach ($menuList as $item):?>
	<label <?php if ($item['level']==1):?>style="display:block;width:100%;clear:both;font-weight:bold;"<?php endif;?>>
	<input type="checkbox" <?php if (in_array($item['url'], $group['permission']['list'])):?>checked="checked"<?php endif;?> name="permission[list][]" value="<?php echo $item['url'];?>" /><?php echo $item['name'];?></label>
	<?php endforeach;?>
	</dd>
	<dd>
		<input type="hidden" name="id" value="<?php echo $group['id'];?>" />
		<button type="submit">提交</button>
	</dd>
</dl>
</form>
<?php 
include_once 'footer.php';
?>