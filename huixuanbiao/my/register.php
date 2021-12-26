<?php
include 'common.php';

if ($user->hasLogin() || !$options->allowRegister) {
    $response->redirect($options->siteUrl);
}
$rememberName = htmlspecialchars(Typecho_Cookie::get('__typecho_remember_name'));
$rememberMail = htmlspecialchars(Typecho_Cookie::get('__typecho_remember_mail'));
$rememberphonenumber = htmlspecialchars(Typecho_Cookie::get('__typecho_remember_phonenumber'));
Typecho_Cookie::delete('__typecho_remember_name');
Typecho_Cookie::delete('__typecho_remember_mail');
Typecho_Cookie::delete('__typecho_remember_phonenumber');

$bodyClass = 'body-100';

include 'header.php';
$luosimaositekey="请替换为您的站点人机验证site key";
?>

<!-- 引入人机验证 -->
<script src="//captcha.luosimao.com/static/dist/api.js"></script>
<script>
    function getResponse(resp){
    console.log(resp);  //获取到前端校验结果
    if(resp){
        document.getElementById("casnoticewordv1").innerHTML="人机验证通过";
        document.getElementById("casv1").setAttribute("type","submit");
     }
}
</script>
<div class="container theme-showcase" style="margin-top:90px">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center;">👋注册回旋镖</h3>
            </div>
    <div class="panel-body" style="margin:0 auto;text-align: center;">
        <p><strong>您目前访问的是正在开发的版本，您需要填写注册邀请码才能注册。</strong></p>
        <p>注册后，您可以在认证后获得<strong>@中山大学</strong>认证标签。</p>
        <p>邮箱地址将作为您的身份认证和账号找回依据,请使用您的校园邮箱注册（当前仅支持@mail.sysu.edu.cn和@mail2.sysu.edu.cn后缀）。</p>
         <form action="<?php $options->registerAction(); ?>" method="post" name="register" role="form">
            <p>
                <label for="vcode" class="sr-only"><?php _e('注册邀请码'); ?></label>
                <input type="text" id="vcode" name="vcode" placeholder="<?php _e('🤝 注册邀请码'); ?>" class="text-l w-100" autofocus />
            </p>
            <p>
                <label for="school" class="sr-only"><?php _e('学校'); ?></label>
                <input type="text" id="school" name="school" placeholder="<?php _e('您的学校名称'); ?>" value="中山大学"  readonly class="text-l w-100" />
            </p>
            <p>
                
                <select name="partofschool" style="width:100%;height:40px">
                    <option value ="广州校区东校园">广州校区东校园</option>
                    <option value ="广州校区南校园">广州校区南校园</option>
                    <option value="广州校区北校园">广州校区北校园</option>
                    <option value="深圳校区">深圳校区</option>
                    <option value="珠海校区">珠海校区</option>
                </select>
            </p>
            <p>
                <label for="name" class="sr-only"><?php _e('登录用户名'); ?></label>
                <input type="text" id="name" name="name" placeholder="<?php _e('👦 登录用户名'); ?>" value="<?php echo $rememberName; ?>" class="text-l w-100" />
            </p>
            <p>
                <label for="screenName" class="sr-only"><?php _e('昵称'); ?></label>
                <input type="text" id="screenName" name="screenName" placeholder="<?php _e('👩 昵称'); ?>" value="<?php echo $rememberName; ?>" class="text-l w-100" />
            </p>
            <p>
            <p>
                <label for="mail" class="sr-only"><?php _e('校园邮箱地址'); ?></label>
                <input type="email" id="mail" name="mail" placeholder="<?php _e('📧您的校园邮箱地址'); ?>" value="<?php echo $rememberMail; ?>" class="text-l w-100" />
            </p>
            <p>
                <label for="phonenumber" class="sr-only"><?php _e('手机号'); ?></label>
                <input type="text" id="phonenumber" name="phonenumber" placeholder="<?php _e('📱手机号'); ?>" class="text-l w-100" />
            </p>
            <p>
                <label for="mail" class="sr-only"><?php _e('密码'); ?></label>
                <input type="password" id="password" name="password" placeholder="<?php _e('🔒请输入密码'); ?>"  class="text-l w-100" />
            </p>
            <p>
                <label for="confirm" class="sr-only"><?php _e('请再输入一遍密码'); ?></label>
                <input type="password" id="confirm" name="confirm" placeholder="<?php _e('🔒请再输入一遍密码'); ?>" class="text-l w-100" />
            </p>
            <p>
            <div class="l-captcha" data-site-key="<?php echo $luosimaositekey; ?>" data-width="100%" data-callback="getResponse"></div>
            </p>
            <p id="casnoticewordv1">注册前，请完成人机验证。</p>
            <p>注册则表明您同意<a href="https://hxb.yizuodi.cn/legal/privacy/">《回旋镖隐私政策》</a>与<a href="https://hxb.yizuodi.cn/legal/agreement/">《回旋镖用户服务协议》</a>。</p>
            <p class="submit">
                <input id="casv1" class="btn btn-success" type="hidden" value="🏄注册">
            </p>
        </form>
        <p></p>
        <p>
            <button type="submit"class="btn btn-success" onclick="javascrtpt:window.location.href='<?php $options->siteUrl(); ?>'"><?php _e('🏠返回广场'); ?></button>
            <?php if($options->allowRegister): ?>
            <button type="submit"class="btn btn-success" onclick="javascrtpt:window.location.href='<?php $options->adminUrl('login.php'); ?>'"><?php _e('👉登录已有账号'); ?></button>
            <?php endif; ?>
        </p>
        <p><?php if ($_SERVER['HTTPS']){echo '您已通过安全链接访问'. PHP_EOL;;}?></p>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
<?php 
include 'common-js.php';
?>
<script>
$(document).ready(function () {
    $('#vcode').focus();
});
</script>
