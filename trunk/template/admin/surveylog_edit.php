<?php
require_once 'header.php';
?>

<form action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>" method="post">
<dl>
	<?php foreach ($survey as $key=>$subject):?>
	<dt><?php echo $subject['subject'];?></dt>
	<dd>
		<?php foreach ($subject['option'] as $option):?>
		<label><input type="radio" name="r_<?php echo $key+1; ?>" <?php $index = sprintf('r_%02d', $key+1); if ($surveylog[$index]==$option['value']):?>checked="checked"<?php endif;?> value="<?php echo $option['value'];?>" /><?php echo $option['label'];?></label>
		<?php endforeach;?>
	</dd>
	<?php endforeach;?>
	<dd>
		<input type="hidden" name="id" value="<?php echo $surveylog['id'];?>" />
		<input type="hidden" name="reffer" value="<?php echo $reffer;?>" />
		<button type="submit">提交</button>
		<button type="button" onclick="history.back();">取消</button>
	</dd>
</dl>
</form>
<?php 
require_once 'footer.php';
?>