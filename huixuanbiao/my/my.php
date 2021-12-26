<?php
include 'common.php';
include 'header.php';
?>
<?php
/**
php检测当前浏览器是否为微信浏览器
*/
function is_wx_browser(){
    if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')){
        //判断微信浏览器为真
        return true;
    }
    //此处为假
    return false;
}
?>
</head>
<body>
   <div class="container theme-showcase" style="margin-top:100px">
       <div class="jumbotron">
        <h1>欢迎访问个人中心</h1>
        <?php if($user->hasLogin()): ?>
        <p>您的头像是：<img src="<?php $user->useravatar(); ?>" style="width:100px"></img></p>
        <p>👋Hi，<?php $user->screenName(); ?>!</p>
        <p>账号：<?php $user->name(); ?> | 昵称：<?php $user->screenName(); ?> | uid：<?php $user->uid(); ?></p>
        <p>认证状态：<?php if($user->hasv()): ?>
         <?php echo"已完成认证"; ?>
        <?php else: ?>
         <?php echo"尚未完成认证"; ?>
        <?php endif; ?>
        </p>
        <?php else: ?>
        <?php endif; ?>
        <?php if($user->hasLogin()): ?>
        <p><button type="button" class="btn btn-success" onclick="javascrtpt:window.location.href='/author/<?php $user->uid(); ?>'">我发布的</button>
        <button type="button" class="btn btn-success" onclick="javascrtpt:window.location.href='/my/manage-posts.php'">管理我发布的</button>
        <button type="button" class="btn btn-success" onclick="javascrtpt:window.location.href='/my/write-post.php'">发布新消息</button>
        </p>
        <p>
        <button type="button" class="btn btn-success" onclick="javascrtpt:window.location.href='/my/profile.php'">修改账户密码及邮箱</button>
        <button type="button" class="btn btn-success" onclick="javascrtpt:window.location.href='/my/v.php'">进行账户认证</button>
        </p>
        <p><?php if ($_SERVER['HTTPS']){echo '您已通过安全链接访问'. PHP_EOL;;}?> | <?php if(is_wx_browser()){echo "您通过微信访问";}else{echo "非微信端访问";} ?></p>
        <p>您当前的ip是：<?php echo $_SERVER['REMOTE_ADDR']; ?></p>
        <?php else: ?>
        <?php $response->redirect($options->login);?>
        <?php endif; ?>
      </div>
<?php
include 'footer.php';
?>
</body>

</html>