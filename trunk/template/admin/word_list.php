<?php
include 'header.php';
$level = array(
	'1'	=> '初级',
	'2'	=> '中级',
	'3'	=> '高级'
);
?>

<table>

  <tr>
    <th>词</th>
    <th>词性</th>
    <th>难度</th>
    <th>操作</th>
  </tr>
  <?php foreach ($wordList as $word):?>
  <tr>
    <td><?php echo $word['word'];?></td>
    <td><?php echo $typeList[$word['type']]['name'];?></td>
    <td><?php echo $level[$word['level']];?></td>
    <td><a href="/admin/word/remove?id=<?php echo $word['id'];?>" onclick="return confirm('删除操作不可撤销！');">删除</a></td>
  </tr>
  <?php endforeach;?>
  <tr>
  	<td colspan="4"><?php echo $page;?></td>
  </tr>
</table>


<?php include 'footer.php';?>