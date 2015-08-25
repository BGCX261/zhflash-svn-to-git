<?php
require_once 'header.php';
?>

<form method="post" action="/admin/<?php echo $GLOBALS['ctrl']; ?>/<?php echo $GLOBALS['method']; ?>">
<dl>
	<dt>请选择您要导出数据的部门</dt>
	<dd>
		<label for="department_id">请选择</label>
		<select name="department_id">
		<option value="0">请选择</option>
		<?php foreach ($departmentList as $item):?>
		<option value="<?php echo $item['id'];?>"><?php echo str_repeat('-', $item['level']-1), $item['name'];?></option>
		<?php endforeach;?>
		</select>
	</dd>
	<dd>
		<button type="submit">导出</button>
	</dd>
</dl>
</form>
<?php 
require_once 'footer.php';
?>