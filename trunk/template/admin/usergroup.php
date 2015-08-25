<?php
include_once 'header.php';
?>

<table>
	<tr>
		<th>ID</th>
		<th>名称</th>
		<th>操作</th>
	</tr>
	<?php foreach ($groupList as $group):?>
	<tr>
		<td><?php echo $group['id'];?></td>
		<td><?php echo $group['name'];?></td>
		<td><a href="/admin/usergroup/edit?id=<?php echo $group['id'];?>">修改</a> <a href="/admin/usergroup/delete?id=<?php echo $group['id'];?>">删除</a></td>
	</tr>
	<?php endforeach;?>
</table>

<?php 
include 'footer.php';
?>