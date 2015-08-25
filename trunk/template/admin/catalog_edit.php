<?php
include 'header.php';
?>
<script type="text/javascript" src="/ria/kindeditor/kindeditor-min.js"></script>
<script type="text/javascript" src="/ria/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
<!--
KindEditor.ready(function(K) {

	editor = K.create('textarea[name="memo"]', {

		allowFileManager : true,
		themeType : 'simple',
		width: '100%',
		height: '500'

	});
});
//-->
</script>

<form method="post" action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>">

<dl>
	<dt>分类信息</dt>
	<dd>
		<label for="pid">上级分类</label>
		<select name="pid">
		<option value="0">上级分类</option>
		<?php foreach ($catalogList as $item):?>
		<option value="<?php echo $item['id'];?>" <?php if ($catalog['pid']==$item['id']):?>selected="selected"<?php endif;?>><?php echo str_repeat('-', $item['level']), $item['name'];?></option>
		<?php endforeach;?>
		</select>
	</dd>
	<dd>
		<label for="name">名称</label>
		<input type="text" name="name" value="<?php echo $catalog['name'];?>" />
	</dd>
	<dd>
		<label for="type">类型</label>
		<input type="radio" name="type" <?php if ($catalog['type']=='page'):?>checked="checked"<?php endif;?> value="page" />单页
		<input type="radio" name="type" <?php if (!$catalog['type'] || $catalog['type']=='list'):?>checked="checked"<?php endif;?> value="list">列表
		<input type="radio" name="type" <?php if ($catalog['type']=='link'):?>checked="checked"<?php endif;?> value="link">链接
		<input type="radio" name="type" <?php if ($catalog['type']=='channel'):?>checked="checked"<?php endif;?> value="channel">频道
	</dd>
	<dd>
		<label for="url">链接地址</label>
		<input type="text" name="url" value="<?php echo $catalog['url'];?>" />
	</dd>
	<dd>
		<label for="priority">显示顺序</label>
		<input type="text" name="priority" value="<?php echo isset($catalog['priority']) ? $catalog['priority'] : 100;?>" />
	</dd>
	<dd>
		<label for="isnavi">导航显示</label>
		<input type="checkbox" name="isnavi" value="1" <?php if ($catalog['isnavi']):?>checked="checked"<?php endif;?> />
	</dd>
	<dd>
		<label for="memo">内容</label><br/>
		 <textarea name="memo" id="memo"><?php echo $catalog['memo'];?></textarea>
	</dd>
	<dd>
		<input type="hidden" name="reffer" value="<?php echo $reffer;?>" />
		<input type="hidden" name="id" value="<?php echo $catalog['id'];?>" />
		<button type="submit">提交</button>
	</dd>
</dl>

</form>

<?php 
include 'footer.php';
?>