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
  <dt>部门信息</dt>  
	<dd>
		<label for="pid">上级部门</label>
		<select name="pid">
		<option value="0">上级部门</option>
		<?php foreach ($departmentList as $item):?>
		<option value="<?php echo $item['id'];?>" <?php if ($department['pid']==$item['id']):?>selected="selected"<?php endif;?>><?php echo str_repeat('-', $item['level']), $item['name'];?></option>
		<?php endforeach;?>
		</select>
	</dd>
	<dd>
		<label for="name">部门名称</label>
		<input type="text" name="name" value="<?php echo $department['name'];?>" />
	</dd>
	<dd>
		<label for="url">部门主页</label>
		<input type="text" name="url" value="<?php echo $department['url'];?>" />
	</dd>
	<dd>
		<label for="memo">部门介绍</label><br/>
		 <textarea name="memo" id="memo"><?php echo $department['memo'];?></textarea>
	</dd>
	<dd>
		<input type="hidden" name="id" value="<?php echo $department['id'];?>" />
		<button type="submit">提交</button>
	</dd>
</dl>
</form>

<?php 
include 'footer.php';
?>