<?php
include 'header.php';
?>

<table>
	<tr>
		<th>ID</th>
		<th>菜单名称</th>
		<th>菜单地址</th>
		<th>操作</th>
	</tr>
	<?php foreach ($menuList as $menu):?>
	<tr>
		<td><?php echo $menu['id'];?></td>
		<td><?php echo str_repeat('&nbsp;&nbsp;', $menu['level']), $menu['name'];?><?php if ($menu['hidden']):?><font color="red">[隐]</font><?php endif;?></td>
		<td><?php echo $menu['url'];?></td>
		<td><a href="/admin/menu/delete?id=<?php echo $menu['id'];?>">删除</a>
			<a href="/admin/menu/edit?id=<?php echo $menu['id'];?>">修改</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>

<?php 
include 'footer.php';
?>