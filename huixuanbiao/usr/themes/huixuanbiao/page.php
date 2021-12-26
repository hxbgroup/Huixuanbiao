<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="container theme-showcase" role="main">
<div class="panel panel-default">
            <div class="panel-heading">
            <h3 class="panel-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
            </div>
<div class="panel-body">
<?php $this->content(); ?>
</div>
</div>
<?php $this->need('newpost.php'); ?>
</div><!-- end #main-->
<?php $this->need('footer.php'); ?>
