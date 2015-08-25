<?php
include 'header.php';
?>

<table>
  <tr>
    <th>ID</th>
    <th>名称</th>
    <th>类型</th>
    <th>操作</th>
  </tr>
  <?php foreach ($catalogList as $item):?>
  <tr>
    <td><?php echo $item['id'];?></td>
    <td><?php echo str_repeat('&nbsp;&nbsp;', $item['level']), $item['name'];?></td>
    <td><?php echo $types[$item['type']];?>
    <?php if ($item['type']=='link'):?>
    	[<a href="<?php echo $item['url'];?>" target="_blank">查看</a>]
    <?php endif;?>
    </td>
    <td>
    	<a href="/admin/catalog/edit?id=<?php echo $item['id'];?>">修改</a>
    	<a href="/admin/catalog/delete?id=<?php echo $item['id'];?>">删除</a>
    </td>
  </tr>
  <?php endforeach;?>
</table>


<?php 
include 'footer.php';
?>