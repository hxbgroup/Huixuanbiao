<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<style>
a {
    color: white;
}
</style>
<div>
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
<style type="text/css">
 #postview img{
     margin:0 auto;
     width:100%;
     display:block;
 }
  #postview p{
     margin:0 auto;
     display:block;
 }
 #postview{width:100%;}
</style>
<script type="text/javascript">
 function knowImgSize(id) {
    var idWidth = $(id).width(),  // 容器的宽度和高度
        idHeight = $(id).height();

    $(id + ' img').each(function(index,img){
        var img_w = $(this).width(),
            img_h = $(this).height();

        // 如果图片自身宽度大于容器的宽度的话 那么高度等比例缩放
        if(img_w > idWidth) {
            
            var height = img_h * idWidth / img_w;
            $(this).css({"width":idWidth, "height":height});
        }
    });

 }
</script>
<div id="postview">
<?php $this->content(); ?>
</div>
<script type="text/javascript">
 // 初始化
 $(function(){
     knowImgSize("#postview");
    setTimeout(knowImgSize("#postview"),5000);
 });
</script>
</div>
</div>
</div>
<?php $this->need('comments.php'); ?>
</div><!-- end #main-->
<?php $this->need('footer.php'); ?>
