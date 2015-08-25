<?php
include 'header.php';
?>

<div>
<form action="/admin/word/add" method="post">
<label><input type="radio" name="level" value="1" />初级</label>
<label><input type="radio" name="level" value="2" />中级</label>
<label><input type="radio" name="level" value="3" />高级</label><br>

<select name="type">
<option>选择词性</option>
<?php foreach ($typeList as $type):?>
<option value="<?php echo $type['id'];?>"><?php echo $type['name'];?></option>
<?php endforeach;?>
</select>
<br>

<label>词语列表</label><br/>
<textarea rows="10" cols="40" name="words"></textarea><br/>
<button type="submit">添加</button>
</form>
</div>
<?php include 'footer.php' ?>