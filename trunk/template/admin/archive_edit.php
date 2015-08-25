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

	K('#checkImage').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
				imageUrl : K("input[name='image']").val(),
				clickFn : function(url, title, width, height, border, align) {
					K("input[name='image']").val(url);
					editor.hideDialog();
				}
			});
		});
	});
});
//-->
</script>
<form method="post" action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>">
<dl>
	<dt>文章信息</dt>
	<dd>
		<label for="catalog_id">选择分类</label>
		<select name="catalog_id">
		<option value="0">选择分类</option>
		<?php foreach ($catalogList as $item):?>
		<option value="<?php echo $item['id'];?>" <?php if ($item['id']==$archive['catalog_id']):?>selected="selected"<?php endif;?>><?php echo str_repeat('-', $item['level']), $item['name'];?></option>
		<?php endforeach;?>
		</select>
	</dd>
	<dd>
		<label for="title">标题</label>
		<input type="text" name="title" value="<?php echo $archive['title'];?>" />
	</dd>
	<dd>
		<label for="image">标题图片</label>
		<input type="text" name="image" value="<?php echo $archive['image'];?>" />
		<button type="button" id="checkImage">选择</button>
	</dd>
	<dd>
		<label for="url">跳转到</label>
		<input type="text" name="url" value="<?php echo $archive['url'];?>" />
	</dd>
	<dd>
		<label for="memo">正文</label><br/>
		<textarea name="memo"><?php echo $archive['memo'];?></textarea>
	</dd>
	<dd>
		<input type="hidden" name="reffer" value="<?php echo $reffer;?>" />
		<input type="hidden" name="id" value="<?php echo $archive['id'];?>" />
		<button type="submit">提交</button>
	</dd>
</dl>
</form>

<?php 
include 'footer.php';
?>