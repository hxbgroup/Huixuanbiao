<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
a {
    color: white;
}
</style>

        <h3><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的消息'),
            'search'    =>  _t('包含关键字 %s 的消息'),
            'tag'       =>  _t('标签 %s 下的消息'),
            'author'    =>  _t('%s 发布的消息')
        ), '', ''); ?></h3>
<?php if ($this->have()): ?>
<?php while($this->next()): ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
    </div>
<div class="panel-body">
    <p>
<span class="label label-default">发布人:<a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
<span class="label label-default">时间:<time datetime="<?php $this->date('c'); ?>"><?php $this->date(); ?></time></span>
<span class="label label-default">分类:<?php $this->category(','); ?></span>
<span class="label label-default">已收到 <?php $this->commentsNum('0 条回复', '1 条回复', '%d 条回复'); ?></span>

</p>

<p><?php $this->excerpt(200, '...'); ?></p>
<p><button type="button" class="btn btn-default" onclick="javascrtpt:window.location.href='<?php $this->permalink() ?>'">阅读详情</button></p>
</div>
</div>
<?php endwhile; ?>
<p><?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></p>
<?php else: ?>
            <h2 class="alert alert-success" role="alert">本来无一物 何处惹尘埃</h2>
            <p><?php _e('你想查看的页面不见了, 要不要搜索看看: '); ?></p>
            <form class="navbar-form navbar" method="post" action="">
                <input type="text" name="s" class="form-control" size="32" />
                <input type="submit" class="btn btn-success" value="搜索🔍" />
            </form>
            
        </div>

<?php endif; ?>
</div>
<!-- end #main -->

<?php $this->need('footer.php'); ?>
