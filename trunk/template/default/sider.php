<div class="rightCol">

        <div class="sideCol listHits flashListHits">

            <h2 class="title"><span>热点视频</span></h2>

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

        <div class="sideCol listHits listComments">

            <h2 class="title"><span>最新视频</span></h2>

            <ol class="list">

<?php foreach ($newList as $key=>$new):?>
<?php if ($key==0):?>
<li class="one"><span><?php echo $key+1;?></span>
<a href="/player.php?fid=<?php echo $new['id'];?>" class="pic">
<img src="<?php echo FILE_PATH . $new['thumb_pic'];?>" width="60" height="40" alt="<?php echo $new['title'];?>" /></a>
<a href="/player.php?fid=<?php echo $new['id'];?>" class="n" title="<?php echo $new['title'];?>"><?php echo $new['title'];?></a>
<a href="/player.php?fid=<?php echo $new['id'];?>" class="n"><em><?php echo $new['hits'];?></em></a></li>
<?php else :?>
<li class="num"><span><?php echo $key+1;?>.</span><a href="/player.php?fid=<?php echo $new['id'];?>" title="<?php echo $new['title'];?>"><?php echo $new['title'];?></a></li>
<?php endif;?>
<?php endforeach;?>
            </ol>

        </div>

    </div>