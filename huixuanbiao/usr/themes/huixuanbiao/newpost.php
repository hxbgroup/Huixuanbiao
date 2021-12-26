 <?php if($this->user->hasLogin()): //判断是否登录 ?>  
    <div class="panel panel-default">
        <div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title">发布消息</h3>
            </div>
        <form action="<?php $this->options->siteUrl(); ?>/action/contents-post-edit" method="post" name="write_post">     
            <p>标题<input type="text" id="title" name="title" value=" " /></p><!--以发布时间作标题，把这里的hidden改成text就能自定义标题了-->     
            <p>内容<textarea name="text" cols="100" rows="4" id="text" autocomplete="off" onkeydown='countChar("text","counter");' onkeyup='countChar("text","counter");'></textarea></p><!--输入框-->     
            <input type="hidden" id="allowComment" name="allowComment" value="1" checked="true" /><!--允许评论-->     
            <input type="hidden" name="do" value="publish" /><!--公开，可以无视-->
            <p>  
        <input type="radio" name="format" id="Lost" value="Lost" checked="checked">  
            <label for="format-post">寻物</label>     
        <input type="radio" name="format" id="Found" value="Found">  
            <label for="format-gallery">招领</label>     
    </p>
            <input type="submit" class="pub" value="发布" />     
        </form>
        <p><?php echo date("Y-m-d H:i:s");?></p>
    </div>     
<?php endif; ?>