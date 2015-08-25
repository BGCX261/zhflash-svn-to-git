<?php
include 'header.php';
?>

<table>
	<tr>
		<th>过滤条件</th>
	</tr>
	<tr>
		<td>
		<form action="/admin/<?php echo $GLOBALS['ctrl'];?>/<?php echo $GLOBALS['method'];?>">
			<select id="department_id" name="department_id">
				<option value="0">部门</option>
				<?php foreach ($departmentList as $item):?>
				<option value="<?php echo $item['id'];?>" <?php if ($item['id']==request('department_id')):?>selected="selected"<?php endif;?>>
					<?php echo str_repeat('-', $item['level']-1), $item['name'];?>
				</option>
				<?php endforeach;?>
			</select>
			
			<button type="submit">查询</button>
			
			<button type="botton" id="refresh_button" onclick="return false;">更新报表</button>
			<button type="botton" id="view_button" onclick="return false;">查看报表</button>
		</form>
		</td>
	</tr>
</table>

<table>
	<tr>
		<th>参评单位</th>
		<th>时间</th>
		<th>IP</th>
		<th><?php echo $survey[0]['subject'];?></th>
		<th><?php echo $survey[1]['subject'];?></th>
		<th><?php echo $survey[2]['subject'];?></th>
		<th><?php echo $survey[3]['subject'];?></th>
		<th><?php echo $survey[4]['subject'];?></th>
		<th><?php echo $survey[5]['subject'];?></th>
		<th><?php echo $survey[6]['subject'];?></th>
		<th><?php echo $survey[7]['subject'];?></th>
		<th>操作</th>
	</tr>
	
	<?php foreach ($logList as $item):?>
	<tr>
		<td><?php echo $departmentList[$item['department_id']]['name'];?></td>
		<td><?php echo date('Y-m-d H:i:s', $item['pubtime']);?></td>
		<td><?php echo $item['ip'];?></td>	
		<td><?php echo $survey[0]['option'][$item['r_01']]['label']; ?></td>
		<td><?php echo $survey[1]['option'][$item['r_02']]['label']; ?></td>
		<td><?php echo $survey[2]['option'][$item['r_03']]['label']; ?></td>
		<td><?php echo $survey[3]['option'][$item['r_04']]['label']; ?></td>
		<td><?php echo $survey[4]['option'][$item['r_05']]['label']; ?></td>
		<td><?php echo $survey[5]['option'][$item['r_06']]['label']; ?></td>
		<td><?php echo $survey[6]['option'][$item['r_07']]['label']; ?></td>
		<td><?php echo $survey[7]['option'][$item['r_08']]['label']; ?></td>
		<td>
		<a href="/admin/surveylog/delete?id=<?php echo $item['id'];?>">删</a> 
		<a href="/admin/surveylog/edit?id=<?php echo $item['id'];?>">改</a></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td colspan="12"><?php echo $page;?></td>
	</tr>
</table>

<?php 
include 'footer.php';
?>

<script type="text/javascript">
<!--
$(document).ready(function(){
	$('#refresh_button').live('click', function(){
		var department_id = $('#department_id').find('option:selected').val();
		var dom = $(this);
		dom.html('更在更新，请稍候.....');
		$.getJSON(
			'/admin/surveystat/stat',
			{
				ajax: true,
				department_id: department_id
			},function(ret){
				if(ret.code==200){
					alert('ok');
				}else{
					alert(ret.msg);
				}
				dom.html('重新生成');
			}
		);
	});

	$('#view_button').live('click', function(){
		var department_id = $('#department_id').find('option:selected').val();
		if(!department_id){
			alert('请选择部门编号');
		}
		window.location.href = "/admin/surveystat/edit?department_id=" + department_id;
	});
	
});
-->
</script>