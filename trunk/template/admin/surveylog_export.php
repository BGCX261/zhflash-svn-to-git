<?php 
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header ("Content-disposition: attachment; filename=".date('Y-m-d', time()).".xls");
?>

<table>
	<tr>
		<th>编号</th>
		<th>IP</th>
		<th>时间</th>
		<th><?php echo $survey[0]['subject'];?></th>
		<th><?php echo $survey[1]['subject'];?></th>
		<th><?php echo $survey[2]['subject'];?></th>
		<th><?php echo $survey[3]['subject'];?></th>
		<th><?php echo $survey[4]['subject'];?></th>
		<th><?php echo $survey[5]['subject'];?></th>
		<th><?php echo $survey[6]['subject'];?></th>
		<th><?php echo $survey[7]['subject'];?></th>		
	</tr>
	
	<?php foreach ($logList as $key=>$item):?>
	<tr>
		<td><?php echo $key+1;?></td>
		<td><?php echo $item['ip'];?></td>
		<td><?php echo date('Y-m-d H:i:s', $item['pubtime']);?></td>
		<td><?php echo $item['r_01']; ?></td>
		<td><?php echo $item['r_02']; ?></td>
		<td><?php echo $item['r_03']; ?></td>
		<td><?php echo $item['r_04']; ?></td>
		<td><?php echo $item['r_05']; ?></td>
		<td><?php echo $item['r_06']; ?></td>
		<td><?php echo $item['r_07']; ?></td>
		<td><?php echo $item['r_08']; ?></td>
	</tr>
	<?php endforeach;?>
</table>