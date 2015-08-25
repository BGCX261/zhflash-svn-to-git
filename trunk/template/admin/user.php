<?php
include 'header.php';
?>

<table>
  <tr>
    <th>过滤条件</th>
  </tr>
  <tr>
    <td>
    <form action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>" method="get">
    <select name="department_id">
		<option value="0">部门</option>
		<?php foreach ($departmentList as $item):?>
		<option value="<?php echo $item['id'];?>" <?php if (request('department_id')==$item['id']):?>selected="selected"<?php endif;?>>
		<?php echo str_repeat('-', $item['level']-1), $item['name'];?></option>
		<?php endforeach;?>
	</select>
	
	<select name="group_id">
		<option value="0">用户组</option>
		<?php foreach ($groupList as $item):?>
		<option value="<?php echo $item['id'];?>" <?php if (request('group_id')==$item['id']):?>selected="selected"<?php endif;?>>
		<?php echo $item['name'];?></option>
		<?php endforeach;?>
	</select>
	<button type="submit">查看</button>
	</form>
	</td>
  </tr>
</table>


<table>
  
  <tr>
    <th>UID</th>
    <th>用户名</th>
    <th>姓名</th>
    <th>用户组</th>
    <th>部门</th>
    <th>电话</th>
    <th>操作</th>
  </tr>
  <?php foreach ($userList as $user):?>
  <tr>
    <td><?php echo $user['id'];?></td>
    <td><?php echo $user['uname'];?></td>
    <td><?php echo $user['alias'];?></td>
    <td><?php echo $groupList[$user['group_id']]['name'];?></td>
    <td><?php echo $departmentList[$user['department_id']]['name'];?></td>
    <td><?php echo $user['phone'];?></td>
    <td><a href="/admin/user/edit?id=<?php echo $user['id'];?>">修改</a> <a href="/admin/user/delete?id=<?php echo $user['id'];?>" class="delete">删除</a></td>
  </tr>
  <?php endforeach;?>
  <tr>
  	<td colspan="7"><?php echo $pageBreak;?></td>
  </tr>
</table>

<?php 
include 'footer.php';
?>