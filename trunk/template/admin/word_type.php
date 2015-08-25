<?php
include_once 'header.php';
?>

<table>
  <tr>
    <th>编号</th>
    <th>名称</th>
    <th>操作</th>
  </tr>
  <?php foreach ($list as $item):?>
  <tr>
    <td><?php echo $item['id'];?></td>
    <td><?php echo $item['name'];?></td>
    <td>
    	<a href="/admin/wordtype/?id=<?php echo $item['id'];?>" onclick="return confirm('确定删除该类型')">删</a>
    	<a href="javascript:void(0);">改</a>
    </td>
  </tr>
  <?php endforeach;?>
  <form action="/admin/wordtype/add" method="post">
  <tr>
    <td>&nbsp;</td>
    <td><input type="text" name="name" /></td>
    <td>
    	<button type="submit">添加</button>
    </td>
  </tr>
  </form>
</table>

<?php
include_once 'footer.php';
?>