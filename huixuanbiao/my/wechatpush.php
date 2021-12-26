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
   
   <div class="container theme-showcase" role="main">
       <div class="jumbotron">
        <h1><?php 
if ($user->hasLogin()) {
   echo '扫码绑定接收本账号消息';
}
else{
    echo '您还未登录~';
}
?></h1>
<p>您的邮箱是：<?php $user->mail(); ?><p></p>*推送系统使用邮箱进行用户区分</p>
<p>
        <?php
        if($user->wechatpush){
            echo '请扫码绑定';
            echo '<p><img src="https://hxb.yizuodi.cn/push/';
            echo $user->mail();
            echo '.jpg"/></p>';
        }
        else{
            echo '请等待系统分配微信推送权限';
        }
        ?></p>
        
        <?php if($user->hasLogin()): ?>
        <?php else: ?>
        <p><button type="button" class="btn btn-success" onclick="javascrtpt:window.location.href='<?php $options->adminUrl('login.php'); ?>'">请先点我登录</button></p>
        <?php endif; ?>
      </div>
<?php
include 'footer.php';
?>
</body>

</html>