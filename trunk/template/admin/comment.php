<?php
require 'header.php';
?>
<table>
	<tr>
		<th>过滤条件</th>
	</tr>
	<tr>
		<td>
		<form action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>">
			<select name="department_id">
				<option value="0">部门</option>
				<?php foreach ($departmentList as $item):?>
				<option value="<?php echo $item['id'];?>" <?php if ($item['id']==request('department_id')):?>selected="selected"<?php endif;?>>
					<?php echo str_repeat('-', $item['level']-1), $item['name'];?>
				</option>
				<?php endforeach;?>
			</select>
			
			<button type="submit">查询</button>
		</form>
		</td>
	</tr>
</table>

<table>
	<tr>
		<th>部门</th>
		<th>姓名</th>
		<th>时间</th>
		<th>内容</th>
		<th>回复</th>
		<th>操作</th>
	</tr>
	<?php foreach ($commentList as $item):?>
	<tr>
		<td><?php echo $departmentList[$item['department_id']]['name'];?></td>
		<td><?php echo $item['author'];?></td>
		<td><?php echo date('Y-m-d H:i:s', $item['pubtime']);?></td>
		<td><?php echo $item['content'];?></td>
		<td><?php echo $item['reply'];?></td>
		<td>
			<a href="/admin/comment/delete?id=<?php echo $item['id'];?>">删除</a>
			<a href="/admin/comment/edit?id=<?php echo $item['id'];?>">修改</a>
		</td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="6"><?php echo $page;?></td>
	</tr>
</table>
<?php 
require_once 'footer.php';
?>