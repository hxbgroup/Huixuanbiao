<?php
/**
 * 这是一套开发用于回旋镖web版本的typecho主题
 * 
 * @package 回旋镖v2 
 * @author 回旋镖 Team & Yizuodi
 * @version 1.0
 * @link https://hxb.yizuodi.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<!--引入全局header-->
<style>
a {
    color: white;
}
</style>



    
<div class="alert alert-success" role="alert">
        <p><strong>公告</strong> 回旋镖感谢您的体验~ </p>
</div>

<!-- 幻灯片功能 -->
<?php //$this->need('slide.php'); ?>

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
<span class="label label-default">已有 <?php get_post_view($this) ?> 次浏览</span>
</p>
<!-- 内容预览-->
<div>
<p><?php $this->excerpt(200, '...'); ?></p>
<p><button type="button" class="btn btn-default" onclick="javascrtpt:window.location.href='<?php $this->permalink() ?>'">阅读详情</button></p>
</div>
</div>
</div>
<?php endwhile; ?>
<p><?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?></p>
</div><!-- end #main-->
<?php $this->need('footer.php'); ?>