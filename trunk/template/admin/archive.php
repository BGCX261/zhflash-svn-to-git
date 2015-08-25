<?php
include 'header.php';
?>

<table>
  <tr>
    <th>过滤条件</th>
  </tr>
  <tr>
    <td>
		<form action="/admin/<?php echo $GLOBALS['ctrl'];?>" method="get">
			<select name="catalog_id">
			<option value="0">栏目</option>
			<?php foreach ($catalogList as $item):?>
			<option value="<?php echo $item['id'];?>" <?php if ($item['id']==request('catalog_id')):?>selected="selected"<?php endif;?>>
				<?php echo str_repeat('-', $item['level']-1), $item['name'];?>
			</option>
			<?php endforeach;?>
			</select>
			
			<select name="status">
			<option value="">状态</option>
			<?php foreach ($status as $index=>$item):?>
			<option value="<?php echo $index;?>" <?php if ($index==request('status')):?>selected="selected"<?php endif;?>>
			<?php echo $item;?>
			</option>
			<?php endforeach;?>			
			</select>
			
			<input type="text" name="key" value="<?php echo request('key');?>" />
			<button type="submit">查看</button>
		</form>
	</td>
  </tr>
</table>


<table>
	<tr>
		<th>ID</th>
		<th>标题</th>
		<th>分类</th>
		<th>作者</th>
		<th>发布时间</th>
		<th>状态</th>
		<th>操作</th>
	</tr>
	<?php foreach ($archiveList as $item):?>
	<tr>
		<td><?php echo $item['id'];?></td>
		<td>
		<?php if ($item['recommend']):?><font color="red">[荐]<?php endif;?>
		<?php if ($item['image']):?><font color="greed">[图]<?php endif;?>
		<a href="/archive?id=<?php echo $item['id'];?>" target="_blank"><?php echo $item['title'];?></a></td>
		<td><?php echo $catalogList[$item['catalog_id']]['name'];?></td>
		<td><?php echo $authors[$item['author']]['alias'];?></td>
		<td><?php echo date('Y-m-d H:i:s', $item['pubtime']);?></td>
		<td><?php echo $status[$item['status']];?>
			<?php if ($item['status']=='notaudit'):?>
			[<a href="/admin/archive/audit?id=<?php echo $item['id'];?>">审</a>]
			<?php elseif ($item['status']=='deleted'):?>
			[<a href="/admin/archive/revoke?id=<?php echo $item['id'];?>">恢复</a>]
			<?php endif;?>
			[<a href="/admin/archive/recommend?id=<?php echo $item['id'];?>"><?php echo $item['recommend'] ? '取消推荐' : '推荐';?></a>]
			</td>
		<td>
			<a href="/admin/archive/edit?id=<?php echo $item['id'];?>">修改</a>
			<a href="/admin/archive/delete?id=<?php echo $item['id'];?>">删除</a>
		</td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="7"><?php echo $page;?></td>
	</tr>
</table>

<?php 
include 'footer.php';
?>
