<?php
include 'common.php';

if ($user->hasLogin()) {
    $response->redirect($options->index);
}
$rememberName = htmlspecialchars(Typecho_Cookie::get('__typecho_remember_name'));
Typecho_Cookie::delete('__typecho_remember_name');

include 'header.php';
?>
<div class="container theme-showcase" style="margin-top:90px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center;">👋 登录回旋镖</h3>
            </div>
    <div class="panel-body" style="margin:0 auto;text-align: center;">
         <form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form">
            <p>
                <label for="name" class="sr-only"><?php _e('您的账号'); ?></label>
                <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>" placeholder="<?php _e('请输入您的账号'); ?>" class="text-l w-100" autofocus />
            </p>
            <p>
                <label for="password" class="sr-only"><?php _e('您的密码'); ?></label>
                <input type="password" id="password" name="password" class="text-l w-100" placeholder="<?php _e('请输入您的密码'); ?>" />
            </p>
            <p>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember" class="checkbox" value="1" id="remember" checked="checked"/>下次自动登录</label>
                </div>
            </p>
            <p class="submit">
                <button type="submit"class="btn btn-success"><?php _e('👉登录'); ?></button>
                <input type="hidden" name="referer" value="<?php $options->siteUrl(); ?>">
            </p>
        </form>
        <p>
            <button type="submit"class="btn btn-success" onclick="javascrtpt:window.location.href='<?php $options->siteUrl(); ?>'"><?php _e('🏠返回首页'); ?></button>
            <?php if($options->allowRegister): ?>
            <button type="submit"class="btn btn-success" onclick="javascrtpt:window.location.href='<?php $options->registerUrl(); ?>'"><?php _e('🏄注册账号'); ?></button>
            <?php endif; ?>
        </p>
        <p><?php if ($_SERVER['HTTPS']){echo '您已通过安全链接访问'. PHP_EOL;;}?> </p>
        </div>
    </div>
</div>
<?php 
include 'common-js.php';
?>
<?php
include 'footer.php';
?>
