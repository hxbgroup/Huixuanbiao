<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div>

            <h2 class="alert alert-success" role="alert">本来无一物 何处惹尘埃</h2>
            <p><?php _e('你想查看的页面不见了, 要不要搜索看看?'); ?></p>
            <form class="navbar-form navbar" method="post" action="">
                <input type="text" name="s" class="form-control" size="32" />
                <input type="submit" class="btn btn-success" value="搜索🔍" />
            </form>
            
        </div>

    </div><!-- end #content-->
	<?php $this->need('footer.php'); ?>
