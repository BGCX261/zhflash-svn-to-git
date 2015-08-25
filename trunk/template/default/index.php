<?php include "header.php";?>
<!--主体部分-->
<div class="stage clearfix">

    <div class="leftCol">

        <div class="leftColBg">

            <div class="colBox videoNews blueBox">
              <h2 class="title"><a class="more" href="/list.php?cid=1">更多 >></a><a href="/list.php?cid=1"><strong>热点短片</strong></a></h2>
<ul class="top picList">
<?php foreach ($hotMovie as $movie):?>
<li><span class="picBox">
<a href="/player.php?fid=<?php echo $movie['id'];?>" target="_blank">
<img style="width:120px;height:90px;" src="<?php echo FILE_PATH . $movie['thumb_pic'];?>" height="90" width="120" alt="<?php echo $movie['title'];?>" />
<span class="video"></span></a></span>
<strong class="name"><a href="/player.php?fid=<?php echo $movie['id'];?>" target="_blank" title="<?php echo $movie['title'];?>">
<?php echo $movie['title'];?></a></strong>
<span class="t">时间：<?php echo date('Y-m-d', $movie['pubdate']);?></span>
<span class="t">点击：<?php echo $movie['hits'];?></span></li>
<?php endforeach;?>
</ul>
<dl class="cataInfo">
<dt>相关栏目</dt>
<?php foreach ($catalogs as $cata):
if ($cata['parent_id']!=1) continue;
?>
<dd><a href="/list.php?cid=<?php echo $cata['id'];?>"><?php echo $cata['name'];?>(<?php echo $cata['count'];?>)</a></dd>
<?php endforeach;?>
</dl>
            </div>

            <div class="colBox videoNews">
              <h2 class="title"><a class="more" href="/list.php?cid=2">更多 >></a><a href="/list.php?cid=2"><strong>热点音乐</strong></a></h2>
<ul class="top picList">
<?php foreach ($hotMusic as $movie):?>
<li><span class="picBox">
<a href="/player.php?fid=<?php echo $movie['id'];?>" target="_blank">
<img style="width:120px;height:90px;" src="<?php echo FILE_PATH . $movie['thumb_pic'];?>" height="90" width="120" alt="<?php echo $movie['title'];?>" />
<span class="video"></span></a></span>
<strong class="name"><a href="/player.php?fid=<?php echo $movie['id'];?>" target="_blank" title="<?php echo $movie['title'];?>">
<?php echo $movie['title'];?></a></strong>
<span class="t">时间：<?php echo date('Y-m-d', $movie['pubdate']);?></span>
<span class="t">点击：<?php echo $movie['hits'];?></span></li>
<?php endforeach;?>
</ul>
<dl class="cataInfo">
<dt>相关栏目</dt>
<?php foreach ($catalogs as $cata):
if ($cata['parent_id']!=2) continue;
?>
<dd><a href="/list.php?cid=<?php echo $cata['id'];?>"><?php echo $cata['name'];?>(<?php echo $cata['count'];?>)</a></dd>
<?php endforeach;?>
</dl>
            </div>
            
            <div class="colBox videoNews">
              <h2 class="title"><a class="more" href="/list.php?cid=3">更多 >></a><a href="/list.php?cid=3"><strong>热点游戏</strong></a></h2>
<ul class="top picList">
<?php foreach ($hotGame as $movie):?>
<li><span class="picBox">
<a href="/player.php?fid=<?php echo $movie['id'];?>" target="_blank">
<img src="<?php echo FILE_PATH . $movie['thumb_pic'];?>" height="90" width="120" alt="<?php echo $movie['title'];?>" />
<span class="video"></span></a></span>
<strong class="name"><a href="/player.php?fid=<?php echo $movie['id'];?>" target="_blank" title="<?php echo $movie['title'];?>">
<?php echo $movie['title'];?></a></strong>
<span class="t">时间：<?php echo date('Y-m-d', $movie['pubdate']);?></span>
<span class="t">点击：<?php echo $movie['hits'];?></span></li>
<?php endforeach;?>
</ul>
<dl class="cataInfo">
<dt>相关栏目</dt>
<?php foreach ($catalogs as $cata):
if ($cata['parent_id']!=3) continue;
?>
<dd><a href="/list.php?cid=<?php echo $cata['id'];?>"><?php echo $cata['name'];?>(<?php echo $cata['count'];?>)</a></dd>
<?php endforeach;?>
</dl>
            </div>
	
        </div>
    </div>

    <div class="rightCol">
    
    
    
    <div class="sideCol listHits flashListHits">

            <h2 class="title"><span>热点动画</span></h2>

            <ol class="list">
<?php foreach ($hotList as $key=>$hot):?>
<?php if ($key==0):?>
<li class="one"><span><?php echo $key+1;?></span>
<a href="/player.php?fid=<?php echo $hot['id'];?>" class="pic">
<img src="<?php echo FILE_PATH . $hot['thumb_pic'];?>" width="60" height="40" alt="<?php echo $hot['title'];?>" /></a>
<a href="/player.php?fid=<?php echo $hot['id'];?>" class="n" title="<?php echo $hot['title'];?>"><?php echo $hot['title'];?></a>
<a href="/player.php?fid=<?php echo $hot['id'];?>" class="n"><em><?php echo $hot['hits'];?></em></a></li>
<?php else :?>
<li class="num"><span><?php echo $key+1;?>.</span><a href="/player.php?fid=<?php echo $hot['id'];?>" title="<?php echo $hot['title'];?>"><?php echo $hot['title'];?></a></li>
<?php endif;?>
<?php endforeach;?>
</ol>
        </div>

        <div class="sideCol listHits flashListHits">

            <h2 class="title"><span>最新动画</span></h2>
<ol class="list">
<?php foreach ($newList as $key=>$item):?>
<?php if ($key==0):?>
<li class="one"><span><?php echo $key+1;?></span>
<a href="/player.php?fid=<?php echo $item['id'];?>" class="pic">
<img src="<?php echo FILE_PATH . $item['thumb_pic'];?>" width="60" height="40" alt="<?php echo $item['title'];?>" /></a>
<a href="/player.php?fid=<?php echo $item['id'];?>" class="n" title="<?php echo $item['title'];?>"><?php echo $item['title'];?></a>
<a href="/player.php?fid=<?php echo $item['id'];?>" class="n"><em><?php echo $item['hits'];?></em></a></li>
<?php else :?>
<li class="num"><span><?php echo $key+1;?>.</span><a href="/player.php?fid=<?php echo $item['id'];?>" title="<?php echo $item['title'];?>"><?php echo $item['title'];?></a></li>
<?php endif;?>
<?php endforeach;?>
</ol>
        </div>

        <div class="sideCol blessing">

            <h2 class="title"><span><a href="">Flash学院</a></span></h2>
            <ul class="list">
				<?php foreach ($newCourse as $item):?>
                <li style="over-flow:hidden"><a href="/course.php?id=<?php echo $item['id'];?>" target="_blank" title="<?php echo $item['title'];?>"><?php echo strsub($item['title'], 30);?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<!--//主体部分-->
<?php include "footer.php";?>
