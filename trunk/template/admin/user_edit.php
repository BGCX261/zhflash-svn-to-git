<?php
include 'header.php';
?>

<div class="edit_box">

<form action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>" method="post">
<dl>
	<dt>更新用户</dt>
	<dd><label for="uname">用户名</label><input type="text" name="uname" value="<?php echo $user['uname'];?>" /></dd>
	<dd><label for="passwd">密码</label><input type="password" name="passwd" /></dd>
	<dd><label for="passwd2">确认密码</label><input type="password" name="passwd2" /></dd>
	<dd><label for="alias">姓名</label><input type="text" name="alias" value="<?php echo $user['alias'];?>" /></dd>
	<dd><label for="phone">电话</label><input type="text" name="phone" value="<?php echo $user['phone'];?>" /></dd>
	<?php if ($GLOBALS['method']!='my'):?>
	<dd><label for="department_id">所属部门</label>
		<select name="department_id">
		<option value="">请选择</option>
		<?php foreach ($departmentList as $depart):?>
		<option value="<?php echo $depart['id'];?>" <?php if ($user['department_id']==$depart['id']):?>selected="selected"<?php endif;?>><?php echo str_repeat('-', $depart['level']-1), $depart['name'];?></option>
		<?php endforeach;?>
		</select>
	</dd>
	<dd><label for="group_id">用户组</label>
		<select name="group_id">
		<option value="">请选择</option>
		<?php foreach ($groupList as $group):?>
		<option value="<?php echo $group['id'];?>"  <?php if ($user['group_id']==$group['id']):?>selected="selected"<?php endif;?>><?php echo $group['name'];?></option>
		<?php endforeach;?>
		</select>
	</dd>
	<?php endif;?>
	<dd>
	<input type="hidden" name="id" value="<?php echo $user['id'];?>" />
	<input type="hidden" name="reffer" value="<?php echo $reffer;?>" />
	<button>提交</button></dd>
</dl>
</form>

</div>

<?php 
include 'footer.php';
?>