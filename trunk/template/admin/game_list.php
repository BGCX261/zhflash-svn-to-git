<?php
include 'header.php';
?>

<table>
	<tr>
		<th>ID</th>
		<th>创建者</th>
		<th>缩略图</th>
		<th>选词</th>
		<th>创建时间</th>
		<th>微博ID</th>
		<th>操作</th>
	</tr>
	<?php foreach ($gameList as $game):?>
	<tr>
		<td><?php echo $game['id'];?></td>
		<td><img src="<?php echo $game['user']['avatar'];?>"><br/><a href="http://weibo.com/<?php echo $game['user']['url'];?>" target="_blank"><?php echo $game['user']['alias'];?></a></td>
		<td><a href="<?php echo $game['large_pic'];?>" target="_blank"><img src="<?php echo $game['thumb_pic'];?>" width="150" height="120" /></a></td>
		<td><?php echo $game['word'];?></td>
		<td><?php echo date('Y-m-d H:i:s', $game['createtime']);?></td>
		<td><a href="http://weibo.com/<?php echo $game['uid'];?>/<?php echo $game['mid'];?>" target="_blank">微博</a></td>
		<td><a href="<?php echo APP_HOST; ?>?gid=<?php echo $game['id'];?>" target="apps_weibo">查看</a></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="7"><?php echo $page;?></td>
	</tr>
</table>

<?php include 'footer.php';?>