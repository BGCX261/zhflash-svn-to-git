<?php
require 'header.php';
?>
<form action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>" method="post">
<dl>
	<dt>回复留言</dt>
	<dd><label>留言单位：<?php echo $departmentList[$comment['department_id']]['name'];?></label></dd>
	<dd>
		<label for="content">留言</label>
		<textarea rows="3" cols="60" name="content"><?php echo $comment['content'];?></textarea>
	</dd>
	<dd>
		<label for="reply">回复</label>
		<textarea rows="3" cols="60" name="reply"><?php echo $comment['reply'];?></textarea>
	</dd>
	<dd>
		<input type="hidden" name="id" value="<?php echo $comment['id'];?>" />
		<input type="hidden" name="reffer" value="<?php echo $reffer;?>" />
		<button type="submit">提交</button>
		<button onclick="history.back();">取消</button>
	</dd>
</dl>
</form>
<?php 
require 'footer.php';
?>