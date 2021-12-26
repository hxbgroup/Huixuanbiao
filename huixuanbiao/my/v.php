<?php
include 'common.php';
include 'header.php';
?>
</head>
<body>
<div class="container theme-showcase" style="margin-top:100px">
<?php if($user->hasLogin()): ?>
<?php
function changevstatus($testdata){
    $db= Typecho_Db::get();
    $res = $db->fetchRow($db->select('table.users.vstatus')->from('table.users')->where('uid = ?', $user->uid));
    $db->query($db->sql()->where('uid = ?', $user->uid)->update('table.users')->rows(array('vstatus'=>$testdata)));
}
?>

<?php
/* 校验邮箱格式*/
function checkMail($mailv) {
$rs=preg_match('|^[_.0-9a-z-]+@mail2?\.sysu\.edu\.cn$|i',$mailv);
return (bool)$rs;
}


function sendgettov($username){
    $url ='https://v.hxb.yizuodi.cn/doedumailv.php?act=tovuser&username='.$username;
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
    $tmpInfo = curl_exec($curl);     //返回api的json对象
    //关闭URL请求
    curl_close($curl);
    return $tmpInfo;    //返回json对象
}

if(sendgettov($user->name)){
    if($user->vstatus){
        
    }
    else{
        changevstatus(1);
        Typecho_Widget::widget('Widget_Users_Profile')->changevstatus();
    }
}

?>

<div class="jumbotron">
<h2>回旋镖身份认证系统</h2>
<?php if($user->hasv()):?>
<p>已完成认证</p>
<p>您通过验证的校园邮箱为<?php $user->mail(); ?></p>
<?php else: ?>
<p>尚未完成认证</p>
<p>当前绑定邮箱<?php $user->mail(); ?></p>
<?php if(checkMail($user->mail)):?>
<form action="https://v.hxb.yizuodi.cn/doedumailv.php?act=mailv" autocomplete="on" method="post">
<p>回旋镖将使用您的edu邮箱认证您的身份</p>
<p>
您的回旋镖账号与校园邮箱地址
<div class="input-group">
<input name="username" class="form-control" required="required" type="text" value="<?php $user->name(); ?>" readonly/>
</div>
</p>
<p>
<div class="input-group">
<input name="email" class="form-control" required="required" type="email" value="<?php $user->mail(); ?>" readonly/>
</div>
</p>
<p>认证流程为：1.点击下方“提交认证请求”按钮，检查邮箱中的邮件，并访问身份验证链接。</p>
<p>2.点击下方“更新认证状态”按钮，更新您的认证状态。</p>
<p>
<input class="btn btn-success" type="submit" value="👉提交认证请求"/>
</p>
</form>
<button type="submit"class="btn btn-success" onclick="javascrtpt:window.location.href='<?php $options->adminUrl('v.php'); ?>'"><?php _e('👉更新认证状态'); ?></button>
<?php else: ?>
<p>请先在个人资料中修改邮箱为校园邮箱。</p>
<button type="button" class="btn btn-success" onclick="javascrtpt:window.location.href='/my/profile.php'">修改账户邮箱</button>
<?php endif; ?>
<?php endif; ?>
<section id="uservuser">
<?php Typecho_Widget::widget('Widget_Users_Profile')->personalFormList(); ?>
</section>
</div>
<?php else: ?>
<p>进行身份认证前，请先登录。</p>
<?php endif; ?>
</div>

<?php
include 'common-js.php';
include 'footer.php';
?>