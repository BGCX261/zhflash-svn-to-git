<?php
include 'header.php';
?>

<table>
  <tr>
    <th>ID</th>
    <th>起始IP</th>
    <th>终止IP</th>
    <th>操作</th>
  </tr>
  <?php foreach ($ipList as $item):?>
  <tr>
    <td><?php echo $item['id'];?></td>
    <td><?php echo $item['s_01'], '.', $item['s_02'], '.', $item['s_03'], '.', $item['s_04'];?></td>
    <td><?php echo $item['e_01'], '.', $item['e_02'], '.', $item['e_03'], '.', $item['e_04'];?></td>
    <td><a href="/admin/ip/delete?id=<?php echo $item['id'];?>">删除</a></td>
  </tr>
  <?php endforeach;?>
</table>
<form method="post" action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>">
<dl>
	<dt>添加一行记录</dt>
	<dd>
		<label for="ipstart">起始IP</label>
		<input type="text" name="ipstart" />
	</dd>
	<dd>
		<label for="ipend">终止IP</label>
		<input type="text" name="ipend" />
	</dd>
	<dd>
	<input type="hidden" name="department_id" value="<?php echo $department_id;?>" />
	<button type="submit">提交</button></dd>
</dl>
</form>


<?php 
include 'footer.php';
?>