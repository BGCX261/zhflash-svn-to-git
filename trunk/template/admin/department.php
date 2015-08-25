<?php
include 'header.php';
?>

<table>
  <tr>
    <th>ID</th>
    <th>部门名称</th>
    <th>操作</th>
  </tr>
  <?php foreach ($departmentList as $item):?>
  <tr>
    <td><?php echo $item['id'];?></td>
    <td><?php echo str_repeat('&nbsp;&nbsp;', $item['level']), $item['name'];?></td>
    <td>
    	<a href="/admin/department/edit?id=<?php echo $item['id'];?>">修改</a>
    	<a href="/admin/department/delete?id=<?php echo $item['id'];?>">删除</a>
    	<a href="/admin/ip/edit?department_id=<?php echo $item['id'];?>">IP</a>
    </td>
  </tr>
  <?php endforeach;?>
</table>


<?php 
include 'footer.php';
?>