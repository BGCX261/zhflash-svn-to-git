<?php
include 'header.php';
?>

<table>
  <tr>
    <th>UID</th>
    <th>头像</th>
    <th>昵称</th>
    <th>性别</th>
    <th>认证类型</th>
    <th>开通时间</th>
    <th>最近访问</th>
  </tr>
  <?php foreach ($userList as $user):?>
  <tr>
    <td><?php echo $user['uid'];?></td>
    <td><img src="<?php echo $user['avatar'];?>" /></td>
    <td><a target="_blank" href="http://weibo.com/<?php echo $user['url'];?>"><?php echo $user['alias'];?></a></td>
    <td><?php echo $user['gender']=='f' ? '女' : '男';?></td>
    <td><?php echo $userType[$user['verify']];?></td>
    <td><?php echo date('Y-m-d H:i:s', $user['firstlogin']);?></td>
    <td><?php echo date('Y-m-d H:i:s', $user['lastlogin']);?></td>
  </tr>
  <?php endforeach;?>
  <tr>
  	<td colspan="7"><?php echo $page;?></td>
  </tr>
</table>


<?php include 'footer.php';?>