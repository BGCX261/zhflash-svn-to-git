<?php
include 'header.php';
?>
<form action="/admin/<?php echo $GLOBALS['ctrl']; ?>/<?php echo $GLOBALS['method']; ?>" method="post">
<dl>
	<dt>菜单</dt>
	<dd>
		<label for="pid">上级菜单</label>
		<select name="pid">
			<option value="0">上级菜单</option>
			<?php foreach ($menuList as $tmp):?>
			<?php if ($tmp['level']==1):?>
			<option value="<?php echo $tmp['id'];?>" <?php if ($menu['pid']==$tmp['id']):?>selected="selected"<?php endif;?>><?php echo $tmp['name'];?></option>
			<?php endif;?>
			<?php endforeach;?>
		</select>
	</dd>
	<dd>
		<label for="name">菜单名称</label>
		<input type="text" name="name" value="<?php echo $menu['name'];?>" />
	</dd>
	<dd>
		<label for="url">链接地址</label>
		<input type="text" name="url" value="<?php echo $menu['url'];?>" />
	</dd>
	<dd>
		<label for="isshow">隐藏</label>
		<input type="checkbox" name="hidden" value="1" <?php if ($menu['hidden']):?>checked="checked"<?php endif;?> />
	</dd>
	<dd>
		<input type="hidden" name="id" value="<?php echo $menu['id'];?>" />
		<button type="submit">提交</button>
	</dd>
</dl>
</form>
<?php 
include 'footer.php';
?>