<?php
require_once 'header.php';//var_dump($stat);
?>

<form action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>" method="post">
<dl>
	<dt>单位名称：<?php echo $departmentList[$stat['department_id']]['name'];?>，回收问卷数：<?php echo $stat['data']['count'];?></dt>
	<dd>
	<b>重要提示：</b><br />
	如需修改统计报表，请保证每一题各选项的选择人数的总和不变，一般来说这个值会等于回收问卷数，如果不相等会导致数据的较大的偏差。
	</dd>
	<?php foreach ($survey as $key=>$subject):?>
	<dt><?php echo $subject['subject'];?></dt>
	<dd>
		<?php foreach ($subject['option'] as $option): $index = sprintf('r_%02d', $key+1);?>
		<label><?php echo $option['label'];?><input type="text" name="data[detail][<?php echo $index;?>][<?php echo $option['value'];?>]" value="<?php echo intval($stat['data']['detail'][$index][$option['value']]);?>" /></label>
		<?php endforeach;?>
	</dd>
	<?php endforeach;?>
	<dd>
		<input type="hidden" name="department_id" value="<?php echo request('department_id');?>" />
		<input type="hidden" name="data[count]" value="<?php echo $stat['data']['count'];?>">
		<input type="hidden" name="reffer" value="<?php echo $reffer;?>" />
		<button type="submit">提交</button>
		<button type="button" onclick="history.back();">取消</button>
	</dd>
</dl>
</form>
<?php 
require_once 'footer.php';
?>