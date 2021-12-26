<?php
include 'common.php';
include 'header.php';

$stat = Typecho_Widget::widget('Widget_Stat');
?>

<div class="container theme-showcase" style="margin-top:100px">
    <div class="jumbotron">
        <?php include 'page-title.php'; ?>
        <div class="row typecho-page-main">
            <div class="col-mb-12 col-tb-3">
                <p><img src="<?php $user->useravatar()?>" style="width:100px"></img></p>
                <h2><?php $user->screenName(); ?></h2>
                <p>账号：<?php $user->name(); ?></p>
                <p><?php _e('你发布了<em>%s</em>条消息，并收到了<em>%s</em>条回复。', 
                $stat->myPublishedPostsNum, $stat->myPublishedCommentsNum); ?></p>
                <p><?php
                if ($user->logged > 0) {
                    $logged = new Typecho_Date($user->logged);
                    _e('最后登录: %s', $logged->word());
                }
                ?></p>
                <p>认证状态：<?php if($user->hasv()): ?>
         <?php echo"已完成认证"; ?>
        <?php else: ?>
         <?php echo"尚未完成认证"; ?>
        <?php endif; ?></p>
            </div>

            <div class="col-mb-12 col-tb-6 col-tb-offset-1 typecho-content-panel" role="form">
                <section>
                    <h3><?php _e('个人信息'); ?></h3>
                    <?php Typecho_Widget::widget('Widget_Users_Profile')->profileForm()->render(); ?>
                </section>

                <?php if($user->pass('administrator', true)): ?>
                <br>
                <section id="writing-option">
                    <h3><?php _e('撰写设置'); ?></h3>
                    <?php Typecho_Widget::widget('Widget_Users_Profile')->optionsForm()->render(); ?>
                </section>
                <?php endif; ?>
                <br>

                <section id="change-password">
                    <h3><?php _e('修改密码'); ?></h3>
                    <?php Typecho_Widget::widget('Widget_Users_Profile')->passwordForm()->render(); ?>
                </section>
            </div>
        </div>
    </div>
</div>

<?php
include 'common-js.php';
include 'form-js.php';
Typecho_Plugin::factory('admin/profile.php')->bottom();
include 'footer.php';
?>
