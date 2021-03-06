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
            <h3 class="panel-title" style="text-align: center;">π η»ε½εζι</h3>
            </div>
    <div class="panel-body" style="margin:0 auto;text-align: center;">
         <form action="<?php $options->loginAction(); ?>" method="post" name="login" role="form">
            <p>
                <label for="name" class="sr-only"><?php _e('ζ¨ηθ΄¦ε·'); ?></label>
                <input type="text" id="name" name="name" value="<?php echo $rememberName; ?>" placeholder="<?php _e('θ―·θΎε₯ζ¨ηθ΄¦ε·'); ?>" class="text-l w-100" autofocus />
            </p>
            <p>
                <label for="password" class="sr-only"><?php _e('ζ¨ηε―η '); ?></label>
                <input type="password" id="password" name="password" class="text-l w-100" placeholder="<?php _e('θ―·θΎε₯ζ¨ηε―η '); ?>" />
            </p>
            <p>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember" class="checkbox" value="1" id="remember" checked="checked"/>δΈζ¬‘θͺε¨η»ε½</label>
                </div>
            </p>
            <p class="submit">
                <button type="submit"class="btn btn-success"><?php _e('πη»ε½'); ?></button>
                <input type="hidden" name="referer" value="<?php $options->siteUrl(); ?>">
            </p>
        </form>
        <p>
            <button type="submit"class="btn btn-success" onclick="javascrtpt:window.location.href='<?php $options->siteUrl(); ?>'"><?php _e('π θΏει¦ι‘΅'); ?></button>
            <?php if($options->allowRegister): ?>
            <button type="submit"class="btn btn-success" onclick="javascrtpt:window.location.href='<?php $options->registerUrl(); ?>'"><?php _e('πζ³¨εθ΄¦ε·'); ?></button>
            <?php endif; ?>
        </p>
        <p><?php if ($_SERVER['HTTPS']){echo 'ζ¨ε·²ιθΏε?ε¨ιΎζ₯θ?Ώι?'. PHP_EOL;;}?> </p>
        </div>
    </div>
</div>
<?php 
include 'common-js.php';
?>
<?php
include 'footer.php';
?>
